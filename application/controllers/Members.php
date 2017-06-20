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
	// one member
	public function get($member_id) {
		if(!$member_id) {
			echo json_encode(array('error' => "Missing member Id"));
			die;
		}

		$this->load->model('members_model', 'members');
		$member = $this->members->get($member_id);
		if (!$member) {
			echo json_encode(array('error' => "Member not found!"));
			die;
		}
		echo json_encode($member);
	}
	// Get member dependents
	public function get_depandants($member_id){
		$this->load->model('members_model', 'members');
		$dependents = $this->members->get_depandants($member_id);
		echo json_encode($dependents);
	}
	//All members
	public function all() {
		$this->load->model('members_model', 'members');
		$members = $this->members->all();
		echo json_encode($members);
	}
	// add member
	public function add() {
		// Check if posted values are not null
		if (empty($this->input->post())) {
			echo json_encode(array('error' => "Missing input post data"));
			die;
		}
		// Check if ID exist first here

		$this->load->model('members_model', 'members');
		$added = $this->members->add($this->input->post());
		echo json_encode($added);
	}
	// Depandants view
	public function depandants($member_id = 0) {
		if(!$member_id) {
			redirect('members');
		}
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$this->load->model('members_model', 'members');
		$data['member'] = $this->members->get($member_id);
		$data['depandants'] = $this->members->get_depandants($member_id);
		$this->load->view('depandants/index', $data);
	}

	// add depandant
	public function add_depandant() {
		if (empty($this->input->post())) {
			echo json_encode(array('error' => "Missing input post data"));
			die;
		}
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$this->load->model('members_model', 'members');

		//This still needs to be reworked
		$added = $this->members->add_depandant($this->input->post());
		if (!$added) {
			echo json_encode(array('error' => "Error executing mySql command"));
			die;
		}
		echo json_encode($added);
	}
	// edit member
	public function edit() {
		// Check if posted values are not null
		if (empty($this->input->post())) {
			echo json_encode(array('error' => "Missing input post data"));
			die;
		}
		//Redirect if id is not set
		if(!$this->input->post('id')) {
			redirect('members');
		}
		// Take id
		$member_id = $this->input->post('id');
		// Then clean up data before posting
		$mysql_data = $this->cunstruct_mysql_data($this->input->post());

		$this->load->model('members_model', 'members');
		$updated = $this->members->edit($member_id, $mysql_data);
		echo json_encode($updated);
	}

	// edit member
	public function edit_depandant() {
		// Check if posted values are not null
		if (empty($this->input->post())) {
			echo json_encode(array('error' => "Missing input post data"));
			die;
		}
		//Redirect if id is not set
		if(!$this->input->post('id')) {
			redirect('members');
		}
		// Take id
		$depandant_id = $this->input->post('id');
		// Then clean up data before posting
		$mysql_data = $this->cunstruct_mysql_data($this->input->post());

		$this->load->model('members_model', 'members');
		$updated = $this->members->edit_depandant($depandant_id, $mysql_data);
		echo json_encode($updated);
	}

	// remove member
	public function remove($member_id = 0) {
		if (!$member_id) {
			redirect('members');
		}
		$this->load->model('members_model', 'members');
		$updated = $this->members->remove($member_id);
		echo json_encode($updated);
	}

	// remove depandant
	public function remove_depandant($member_id, $depandant_id = 0) {
		if (!$depandant_id) {
			redirect('members/depandants/'.$member_id);
		}
		$this->load->model('members_model', 'members');
		$updated = $this->members->remove_depandant($depandant_id);
		echo json_encode($updated);
	}

	// Change a users policy status 0 = lapse 1 = active
	public function mark_as_lapsed() {}

	private function cunstruct_mysql_data($array) {
		// Then remove id from the list of columns to be updated
		array_shift($array);
		// remove other uneccessary keys
		if (count($array) <= 9)
			array_splice($array, 7);

		array_splice($array, 15);

		return $array;
	}
}
