<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

	 public function register_user() {
			$post_values = $this->input->post();

			$name = $post_values['name'];
			$surname = $post_values['surname'];
			$cell_number = $post_values['cell_number'];
			$gender = $post_values['gender'];
			$refferal_number = $post_values['refferal_number'];
			$email = $post_values['email'];
			$password = $post_values['password'];
			$username = $post_values['username'];
			//Account
			$accout_type = $post_values['account_type'];
			$account_holder = $post_values['account_holder'];
			$bank = $post_values['bank_name'];
			$branch_code = $post_values['bank_code'];

			$account_number = $post_values['account_number'];
			$this->load->model('user_model', 'user');
			if(!empty($email) && !empty($refferal_number)){
				$user_id = $this->user->new_user_emal_ref($name,$surname,$cell_number,$gender,$email,$refferal_number,$password,$username);
			}
			elseif (!empty($refferal_number)) {
				$user_id = $this->user->new_user_ref($name,$surname,$cell_number,$gender,$refferal_number,$password,$username);
			} elseif (!empty($email)) {
				$user_id = $this->user->new_user_emal($name,$surname,$cell_number,$gender,$email,$password,$username);
			} else {
				$user_id = $this->user->new_user($name,$surname,$cell_number,$gender,$password,$username);
			}

			if (!empty($user_id)) {
					$account = $this->user->new_account($user_id,$bank,$branch_code,$account_holder,$account_number,$accout_type);
					echo json_encode($account);die();
			} else
			$data = array('value' => "user not registered");

			echo json_encode($data);die();
	}

  public function register() {
    $this->load->view('login/register');
  }
}
