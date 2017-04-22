<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

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
		$this->load->view('index');
	}

	public function get_getter_count(){
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$user_id = $user_data['user_id'];

		$this->load->model('site_model', 'site');
		$getter_count = (int)$this->site->get_all_getter_count($user_id);
		if($getter_count >= 0){
			$data = array('status' => true,
										'message' => 'Getter Counter returned successfully!',
										'count' => $getter_count
									);
		}else{
			$data = array('status' => false,
										'message' => 'Error trying to retrieve getter counter.'
									);
		}
		echo json_encode($data);die();
	}

	public function get_helper_count(){
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$user_id = $user_data['user_id'];

		$this->load->model('site_model', 'site');
		$helper_count = (int)$this->site->get_all_herlper_count($user_id);
		if($helper_count >= 0){
			$data = array('status' => true,
										'message' => 'Helper Counter returned successfully!',
										'count' => $helper_count
									);
		}else{
			$data = array('status' => false,
										'message' => 'Error trying to retrieve helper counter.'
									);
		}

		echo json_encode($data);die();
	}

	public function get_my_reward_count(){
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$user_id = $user_data['user_id'];

		$this->load->model('site_model', 'site');
		$helper_count = (int)$this->site->get_my_reward_count($user_id);
		if($helper_count >= 0){
			$data = array('status' => true,
										'message' => 'Reward Counter returned successfully!',
										'count' => $helper_count
									);
		}else{
			$data = array('status' => false,
										'message' => 'Error trying to retrieve reward counter.'
									);
		}

		echo json_encode($data);die();
	}
}
