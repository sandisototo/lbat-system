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
			echo json_encode($updated);
		}
	}
}
