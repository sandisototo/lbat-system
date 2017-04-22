<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getter extends CI_Controller {

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
 		$users = $this->admin->update_transaction_status();

		 $user_session = $this->session->get_userdata();
		 $user_data = $user_session['user'];
		 $is_logged_in = $user_data['is_logged_in'];
		 if(!isset($is_logged_in) || $is_logged_in != true){
			 redirect('logout');
		 }
	 }
	public function index()
	{
		$this->load->view('getter/index');
	}
	public function  get_all_transactions(){
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$user_id = $user_data['user_id'];

		$this->load->model('getter_model', 'getter');
		$all_transactions = $this->getter->get_all_transactions($user_id);
		echo json_encode($all_transactions);die();
	}

	public function  update_transaction(){
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$user_id = $user_data['user_id'];

		$post_values = $this->input->post();
		//print_r($post_values); die();
		$transaction_id = $post_values['transaction_id'];
		$helper_id = $post_values['helper_id'];
		$this->load->model('getter_model', 'getter');
		$transaction = $this->getter->update_transaction($helper_id, $user_id, $transaction_id);

		if($transaction){
			$data = array('status' => true,
		                'message' => 'Transaction is completed successfully!'
									);
		 echo json_encode($data);die();
		}else{
			$data = array('status' => false,
										'message' => 'Error with the last update!'
									);
		 echo json_encode($data);die();
		}
	}
}
