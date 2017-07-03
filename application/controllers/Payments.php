<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
			 parent::__construct();
			 $this->_is_logged_in();
	}

	private function _is_logged_in() {
		 $this->load->model('admin_model', 'admin');
		 $user_session = $this->session->get_userdata();
		 $user_data = $user_session['user'];
		 $is_logged_in = $user_data['is_logged_in'];
		 if(!isset($is_logged_in) || $is_logged_in != true){
			 redirect('logout');
		 }
	}

	public function index() {
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$this->load->view('payments/index');
	}

	public function  unpaid() {
		$this->load->model('payments_model', 'payments');
		$members = $this->payments->unpaid();
		echo json_encode($members);
	}

	public function  paid() {
		$this->load->model('payments_model', 'payments');
		$members = $this->payments->paid();
		echo json_encode($members);
	}
	public function  lapsed() {
		$this->load->model('payments_model', 'payments');
		$members = $this->payments->lapsed();
		echo json_encode($members);
	}

	public function  paid_for_this_month() {

		$form = $this->input->post();
		$paid_members = json_decode($form['paid_members'], true);

		$ids = [];
		foreach ($paid_members as $key => $value) {
			array_push($ids, $value['id']);
		}

		$mysql_data = array('current_month_payment_status' => 1);
		$this->load->model('payments_model', 'payments');
		$updated = $this->payments->paid_for_this_month($ids, $mysql_data);
		if ( $updated ) {
			$mysql_data = [];
			foreach ($ids as $key => $value) {
				$mysql_data[$key]['user_id'] = $value;
				$mysql_data[$key]['user_plan_amount'] = 200;
			}

			$recorded = $this->payments->record_payment($mysql_data);
			echo json_encode($recorded);
		} else {
			echo json_encode(array('error' => "There was an error retrieving paid_for_this_month members"));
		}
	}

	public function reset_to_unpaid() {
		$this->load->model('payments_model', 'payments');
		$mysql_data = $arrayName = array('paid_for_this_month' => 0 );
		$updated = $this->payments->paid_for_this_month($ids, $mysql_data);
		if ( $updated ) {
			echo json_encode($updated);
		} else {
			echo json_encode(array('error' => "There was an error resetting member for this month"));
		}
	}

	// Payments History view
	public function history($member_id = 0) {
		if(!$member_id) {
			redirect('members');
		}
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$this->load->model('members_model', 'members');
		$this->load->model('payments_model', 'payments');
		$data['member'] = $this->members->get($member_id);
		$data['history'] = $this->payments->get_history($member_id);
		$this->load->view('payments/history', $data);
	}
	// Get History
	public function get_history($member_id){
		$this->load->model('payments_model', 'payments');
		$histroy = $this->payments->get_history($member_id);
		echo json_encode($histroy);
	}

	// add depandant
	public function load_payment() {
		if (empty($this->input->post())) {
			echo json_encode(array('error' => "Missing input post data"));
			die;
		}
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$this->load->model('payments_model', 'payments');

		if($this->isCurrentMonth($this->input->post('timestamp'))) {
			$user_id = $this->input->post('user_id');
			$this->payments->paid_for_this_month_single($user_id);
		}
		//This still needs to be reworked
		$loaded = $this->payments->load_payment($this->input->post());
		if (!$loaded) {
			echo json_encode(array('error' => "Error executing mySql command"));
			die;
		}
		echo json_encode($loaded);
	}

	// revert payment
	public function revert_payment($member_id, $payment_id = 0, $timestamp = null) {
		if (!$payment_id) {
			redirect('members/history/'.$member_id);
		}
		$this->load->model('payments_model', 'payments');
		if($this->isCurrentMonth($timestamp)) {
			$user_id = $this->input->post('user_id');
			$this->payments->revert_paid_for_this_month($member_id);
		}
		$updated = $this->payments->revert_payment($payment_id);
		echo json_encode($updated);
	}

	//check Date
	function isCurrentMonth($month) {
		date_default_timezone_set('UTC');
		$current_month = date('m');
		$current_year = date('y');

		$compare_month = date("m", strtotime($month));
		$compare_year = date("y", strtotime($month));

		$current_year_month = $current_year.$current_month;
		$compare_year_month = $compare_year.$compare_month;
		return $compare_year_month === $current_year_month ? true : false;
	}
}
