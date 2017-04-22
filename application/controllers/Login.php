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
	public function index()
	{	
		$this->load->view('login/index');
	}

	public function validate_user()
{
			$post_values = $this->input->post();

			$username = $post_values['username'];
			$password = $post_values['password'];

			$this->load->model('login_model', 'login');
			$user = $this->login->validate_user($username,$password);
			//print_r($user);die();
			if(empty($user))
			{
					$data = array('value' => "notFound");
					echo json_encode($data);die();
			}
			else
			{
				$name = $user['name'];
				$surname = $user['surname'];
				$is_helper = $user['user_type'];
				$cell_number = $user['cell_number'];

				//die($status);
				$data = array('user_id' => $user['id'],
						'is_logged_in' => true,
						'is_helper'=>$is_helper,
						'name'=>$name,
						'surname'=>$surname,
					  'cell_number' => $cell_number);

				//print_r(	$data );die();
				$this->session->set_userdata('user', $data);
				echo json_encode($data);die();
			}
}
public function validate_admin()
{
			$post_values = $this->input->post();

			$username = $post_values['username'];
			$password = $post_values['password'];

			$this->load->model('admin_model', 'admin');
			$user = $this->admin->validate_user($username,$password);
			//print_r($user);die();
			if(empty($user))
			{
					$data = array('value' => "notFound");
					echo json_encode($data);die();
			}
			else
			{
				$name = $user['name'];
				$surname = $user['surname'];
				//die($status);
				$data = array('admin_id' => $user['id'],
						'is_logged_in' => true,
						'name'=>$name,
						'surname'=>$surname);

				$this->session->unset_userdata('user');
				$this->session->set_userdata('admin', $data);
				//print_r($this->session->get_userdata()); die();
				echo json_encode($data);die();
			}
}
  public function register()
  {
    $this->load->view('login/register');
  }

}
