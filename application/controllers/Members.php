<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

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
		if (!isset($is_logged_in) || $is_logged_in != true) {
			 redirect('logout');
		}
	}

	public function index() {
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$this->load->view('members/index');
	}

	//All members
	public function all() {
		$this->load->model('members_model', 'members');
		$members = $this->members->all();
		echo json_encode($members);
	}

	// add member
	public function add_member() {}

	// edit member
	public function edit() {
		// Check if posted values are not null
		if (empty($this->input->post())) {
			echo json_encode(array('error' => "Missing input post data"));
		}
		// Take id
		$member_id = $this->input->post('id');
		// Then clean up data before posting
		$mysql_data = $this->cunstruct_mysql_data($this->input->post());

		$this->load->model('members_model', 'members');

		$updated = $this->members->edit($member_id, $mysql_data);
		echo json_encode($updated);
	}

	// remove member
	public function remove_member() {}

	// Change a users policy status 0 = lapse 1 = active
	public function mark_as_lapsed() {}

	private function cunstruct_mysql_data($array) {
		// Then remove id from the list of columns to be updated
		array_shift($array);
		// remove other uneccessary keys
		array_splice($array, 15);

		return $array;
	}
}
