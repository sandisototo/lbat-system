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
	 public function __construct()
	 {

		 parent::__construct();

		 $this->_is_logged_in();

	 }

 private function _is_logged_in(){

	$user_session = $this->session->get_userdata();
	$user_data = $user_session['admin'];
	 $is_logged_in = $user_data['is_logged_in'];

	 if(!isset($is_logged_in) || $is_logged_in != true){
		 redirect('logout');
	 }else{
		$this->load->model('admin_model', 'admin');
	 	$users = $this->admin->update_transaction_status();
	 }
 }

	public function index()
	{

		$this->load->model('admin_model', 'admin');
		$now = new DateTime();
		$today =  $now->format('YYYY-MM-DD h:mm:ss');    // MySQL datetime format
		$getters_new = $this->admin->get_all_overdue_transactions($today);
		foreach ($getters_new as $getters) {
			$getters_new = $this->admin->update_user_status_to_overdue($getters['getter_user_id']);
		}

		$this->load->view('admin/index');
	}
	public function  get_all_admins(){
		$this->load->model('admin_model', 'admin');
		$admin = $this->admin->get_all_admins();
		echo json_encode($admin);die();
	}


	public function  get_all_users(){
		$this->load->model('admin_model', 'admin');
		$users = $this->admin->get_all_users();
		echo json_encode($users);die();
	}
	public function  all_none_getters(){
		$this->load->model('admin_model', 'admin');
		$users = $this->admin->all_none_getters();
		echo json_encode($users);die();
	}

  public function  get_all_none_getters(){
    $this->load->model('admin_model', 'admin');
    $none_getters = $this->admin->get_all_none_getters();
    echo json_encode($none_getters);die();
  }
	public function notifications()
	{
		$this->load->view('admin/notification_list');
	}

	public function  get_all_notifications(){
		$this->load->model('admin_model', 'admin');
		$notification_list = $this->admin->get_notification_list();
		echo json_encode($notification_list);die();
	}
	public function remove_from_notifications(){
		$post_values = $this->input->post();
		$user_id = $post_values['user_id'];
		$this->load->model('admin_model', 'admin');
		$this->admin->remove_from_notifications($user_id);	
	}

  public function  add_to_getters(){
    $this->load->model('helper_model', 'helper');
    $getters = $this->helper->get_all_getters();
    echo json_encode($getters);die();
  }
  public function add_new_getters()
	{
		$this->load->view('getter/new_getter');
	}
	public function create_getter()
	{
			$post_values = $this->input->post();
			//print_r($post_values);die();
			$user_id = $post_values['user_id'];
			$amount_expected = $post_values['amount_expected'];

			$this->load->model('admin_model', 'admin');

			$getters = $this->admin->new_getter($user_id,$amount_expected);

			if(!empty($getters))
			{
				 $this->admin->update_user_status($user_id);
				echo json_encode($getters);die();
			}
			else
			$data = array('value' => "user not registered");
					echo json_encode($data);die();

	}
	public function  get_helper_getter(){
		$this->load->model('admin_model', 'admin');
		$helpers = $this->admin->get_helper_getter();

		echo json_encode($helpers);die();
		//$users = $this->admin->get_getter_byhelper_id(1);


	}
	public function  getter_byhelper_id($helper_id){

		$this->load->model('admin_model', 'admin');

			$users_getter = $this->admin->get_getter_byhelper_id($helper_id);
			echo json_encode($users_getter);die();

	}
	public function view_helpers()
	{
		$this->load->view('admin/view_helpers');
	}
	public function  get_all_getters(){

		$this->load->model('admin_model', 'admin');

			$getters = $this->admin->get_all_getters();
			echo json_encode($getters);die();

	}
	public function view_getters()
	{
		$this->load->view('admin/view_getters');
	}
	public function view_transaction($user_id)
	{
		$this->load->view('admin/view_transaction');
	}
	public function view_overdue_transactions()
	{
		$this->load->view('admin/view_overdue_transactions');
	}
	public function  get_getter_all_transactions($user_id){

		$this->load->model('admin_model', 'admin');

			$getters_new = $this->admin->get_getter_all_transactions($user_id);
			echo json_encode($getters_new);die();

	}
	public function  get_helper_all_transactions($user_id){

		$this->load->model('admin_model', 'admin');

			$getters_new = $this->admin->get_helper_all_transactions($user_id);
			echo json_encode($getters_new);die();

	}
public function  get_all_overdue_transactions($todays_date){

		$this->load->model('admin_model', 'admin');

			$getters_new = $this->admin->get_all_overdue_transactions($todays_date);
			echo json_encode($getters_new);die();

	}
	public function  get_user_byid($user_id){

		$this->load->model('admin_model', 'admin');

			$user= $this->admin->get_user($user_id);
			echo json_encode($user);die();

	}
	public function  paid_transaction_byadmin($transaction_id,$getter_id,$helper_id){
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['admin'];

		$this->load->model('admin_model', 'admin');
		 	$admin_id =  $user_data['admin_id'];

			$trans_updated= $this->admin->admin_update_transaction($admin_id,$helper_id, $getter_id, $transaction_id);

			if($trans_updated != 0){
			echo json_encode($trans_updated);die();
			}
			echo json_encode($trans_updated);die();

	}

	public function create_admin()
	{
			$post_values = $this->input->post();
			//print_r($post_values);die();
			$user_id = $post_values['user_id'];
			$username = $post_values['username'];
			$password = $post_values['password'];

			$this->load->model('admin_model', 'admin');

			$admin = $this->admin->new_admin($user_id,$username,$password);

			if(!empty($admin))
			{

				echo json_encode($admin);die();
			}
			else
			$data = array('value' => "user not registered");
					echo json_encode($data);die();

	}

}
