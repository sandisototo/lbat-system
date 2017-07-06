<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['admin'];
		$is_logged_in = $user_data['is_logged_in'];
		 if(!isset($is_logged_in) || $is_logged_in != true){
			 redirect('logout');
		 }else{
			$this->load->model('admin_model', 'admin');
		 }
	}

	public function index() {
		$this->load->model('admin_model', 'admin');
 		$this->load->view('admin/index');
	}

	public function get_all_admins() {
		$this->load->model('admin_model', 'admin');
		$admin = $this->admin->get_all_admins();
		echo json_encode($admin);
	}

  // crete admin needs to be looked at
	public function create_admin() {
		$post_values = $this->input->post();

		$user_id = $post_values['user_id'];
		$username = $post_values['username'];
		$password = $post_values['password'];

		$this->load->model('admin_model', 'admin');

		$admin = $this->admin->new_admin($user_id,$username,$password);
		if (!empty($admin)) {
			echo json_encode($admin);
			die();
		}
		$data = array('value' => "Admin not registered");
		echo json_encode($data);
	}

	// Edit Admin
	public function edit_admin() {}

	// Remove Admin
	public function remove_admin() {}

}
