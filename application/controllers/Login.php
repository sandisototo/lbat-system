<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index() {
		$this->load->view('login/index');
	}

	public function validate_user() {
		$post_values = $this->input->post();

		$username = $post_values['username'];
		$password = $post_values['password'];

		$this->load->model('login_model', 'login');
		$user = $this->login->validate_user($username,$password);

		if (empty($user)) {
			 $data = array('error' => "User Not Found");
			 echo json_encode($data);
			} else {
				$name = $user['name'];
				$surname = $user['surname'];
				$cell_number = $user['cell_number'];

				$data = array(
					'user' => $user,
					'user_id' => $user['id'],
					'is_logged_in' => true,
					'name' => $name,
					'surname' => $surname,
					'cell_number' => $cell_number
				);
				$this->session->set_userdata('user', $data);
				echo json_encode($data);
			}
	}

	public function validate_admin() {
		$post_values = $this->input->post();

		$username = $post_values['username'];
		$password = $post_values['password'];

		$this->load->model('admin_model', 'admin');
		$user = $this->admin->validate_admin($username,$password);
		$this->load->library('bcrypt_lib');
		if (empty($user) || !$this->bcrypt_lib->verify($password, $user['password'])) {
			$data = array('error' => "User Not Found");
			echo json_encode($data);
		} else {
				$name = $user['name'];
				$surname = $user['surname'];

				$data = array(
					'user' => $user,
					'user_id' => $user['id'],
					'is_logged_in' => true,
					'name'=>$name,
					'surname'=>$surname
				);

				$this->track_login($user);
				$this->session->set_userdata('user', $data);
				echo json_encode($data);
		}
	}

	// Track who logged in
	public function track_login($user) {
		$name = $user['name'];
		$surname = $user['surname'];
		$mysql_data = array(
			'name' => $name,
			'surname' => $surname
		);

		$this->load->model('admin_model', 'admin');
		$this->admin->track_login($mysql_data);
		return;
	}

  public function register() {
    $this->load->view('login/register');
  }
}
