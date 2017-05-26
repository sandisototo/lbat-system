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
	 public function __construct()
	 {

		 parent::__construct();

		 $this->_is_logged_in();

	 }

	 private function _is_logged_in(){
		 $this->load->model('admin_model', 'admin');
		 $user_session = $this->session->get_userdata();
		 $user_data = $user_session['user'];
		 $is_logged_in = $user_data['is_logged_in'];
		 if(!isset($is_logged_in) || $is_logged_in != true){
			 redirect('logout');
		 }
	 }
	public function index()
	{
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$this->load->view('payments/index');
	}
	public function transactions()
	{
		$this->load->view('helper/transactions');
	}

	public function  get_all_users(){
		$this->load->model('payments_model', 'payments');
		$users = $this->payments->get_all_users();
		echo json_encode($users);die();
	}

	public function  get_all_transactions(){
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$user_id = $user_data['user_id'];

		$this->load->model('helper_model', 'helper');
		$all_transactions = $this->helper->get_all_transactions($user_id);
		echo json_encode($all_transactions);die();
	}
	public function  add_to_notification_list(){
 		$post_values = $this->input->post();

 		$user_session = $this->session->get_userdata();
 		$user_data = $user_session['user'];
 		$user_id = $user_data['user_id'];


 		$this->load->model('helper_model', 'helper');
 		$count = $this->helper->is_added($user_id);
		//print_r($user);die();
 		if($count == 0){
				$search_amount = $post_values['search_amount'];
 				$inserted = $this->helper->add_to_getter_request($user_id,$search_amount);
 				if($inserted){
 					$data = array('status' => true,
 												'message' => 'Added to notification list successfully!'
 											);
 				 echo json_encode($data);die();
 				}else{
 					$data = array('status' => false,
 												'message' => 'Error adding this record to notification list'
 											);
 				 echo json_encode($data);die();
 				}

 		}else{
 			$data = array('status' => false,
 		                'message' => 'You have already requested to be notified. Please wait for admin to allocate you before requesting again.'
 									);
 		 echo json_encode($data);die();
 		}

 	}

	public function  add_to_my_getters(){
		$post_values = $this->input->post();
		//print_r($post_values);die();
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$user_id = $user_data['user_id'];
		$reward_amount = $post_values['reward_amount'];
		$user_type = 2;

		$this->load->model('helper_model', 'helper');
		$inserted = $this->helper->add_to_my_getters($user_id,$reward_amount,$user_type);
		if($inserted){

				$getter_id  = $post_values['getter_id'];
				$due_date = $post_values['due_date'];
				$reward_date  = $post_values['reward_date'];
			  $amount_expected = $post_values['amount_expected'];
				$inserted = $this->helper->new_transaction($user_id,$getter_id, $due_date, $reward_date, $amount_expected);
				if($inserted){
					$this->helper->update_transaction_status($getter_id);
					$data = array('status' => true,
												'message' => 'Transaction created successfully!'
											);
				 echo json_encode($data);die();
				}else{
					$data = array('status' => false,
												'message' => 'Error adding this record to transactions'
											);
				 echo json_encode($data);die();
				}

		}else{
			$data = array('status' => false,
		                'message' => 'Error adding this record to getter list'
									);
		 echo json_encode($data);die();
		}

	}
}
