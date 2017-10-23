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
		$user_session = $this->session->get_userdata();
		if(!array_key_exists('user', $user_session) || $user_session['user']['is_logged_in'] != true){
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
		return $this->output
        		->set_output(json_encode($members));
	}
	// add member
	public function add() {
		if ($this->validateMemberform()) { //validation
			$error = str_replace('<p>', ' ', str_replace('</p>', ' ', validation_errors()));
			return $this->output->set_output(json_encode(array('error' => true, 'message'=> $error)));
		} else {
			$data_input = new StdClass();
 			foreach ( $this->input->post() as $key => $value) {
	   		$data_input->$key = $value;
	   	}

   		$error = false;
      $data_input->filename = NULL;
      $file_upload = $this->uploadfile('file_upload');

			if (is_array($file_upload) && array_key_exists('file_name', $file_upload)) {
				$data_input->filename = $file_upload['file_name'];
			}

			if (isset($_FILES['file_upload']) && $data_input->filename == NULL) {
	      $error = true;
	    }

	    if (!$error) {
	      // Check if ID exist first here
				$this->load->model('members_model', 'members');
				$last_insert_id = $this->members->add($data_input);
				if ($last_insert_id) {
					return $this->output->set_output(json_encode(array('error' => false, 'filename'=>$data_input->filename, 'member'=> array('id' => $last_insert_id))));
				} else {
					return $this->output->set_output(json_encode(array('error' => true, 'filename'=>$data_input->filename, 'message'=>'There was an error executing mySql in add() method of Members Controller')));
				}

	    } else {
        $file_upload = str_replace("<p>", '', $file_upload);
		    $file_upload =str_replace("</p>", '', $file_upload);
	      return $this->output->set_output(json_encode(array('error' => true, 'message'=>  $file_upload)));
	    }
		}
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
		if (empty($this->input->post()) || !$this->input->post('member_id')) {
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
		if($this->validateMemberform()){ //validation
			$error = str_replace('<p>', ' ', str_replace('</p>', ' ', validation_errors()));
			return $this->output
        		->set_output(json_encode(array('error' => true, 'message'=> $error)));
		}elseif(!$this->input->post('id')){
			redirect('members');
		}else{
			$filename = $this->input->post('filename');
			$file_upload = $this->uploadfile('file_upload');
			if(is_array($file_upload) && array_key_exists('file_name', $file_upload)){
				//deleting the old file
				$this->fileDelete($filename);
				$filename = $file_upload['file_name'];
			}
			$error = false;


			// Take id
			$member_id = $this->input->post('id');
			// Then clean up data before posting
			$mysql_data = $this->cunstruct_mysql_data($this->input->post());
			if ($filename != 'null') {
				$mysql_data['filename'] = $filename;
			} else {
				$mysql_data['filename'] = NULL;
			}

			if (isset($_FILES['file_upload']) && !is_array($file_upload)) {
		   	$error = true;
		  }

	    if (!$error) {
			$this->load->model('members_model', 'members');
			$updated = $this->members->edit($member_id, $mysql_data);

			return $this->output->set_output(json_encode(['data'=>$mysql_data, 'filename'=>$mysql_data['filename'], 'status'=>$updated, 'error'=>false]));
			} else {
				$file_upload = str_replace("<p>", '', $file_upload);
				$file_upload =str_replace("</p>", '', $file_upload);

				return $this->output->set_output(json_encode(array('message' => $file_upload, 'error' => true)));
			}
		}
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
		$member = $this->members->get($member_id);
		$error = false;
		if ($member['filename'] != '') {
			$error = $this->fileDelete($member['filename']);
		}

		if ($error == false) {
			echo json_encode(['error'=>true]);
		} else {
			$updated = $this->members->remove($member_id);
			echo json_encode(['error'=>false]);
		}
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
		unset($array['id']);
		// remove other uneccessary keys
		unset($array['$$hashKey']);
		unset($array[0]);

		$return_array = [];
		//Fix for data columns with null values
		foreach ($array as $key => $value) {
			if($value != 'null'){
				$return_array[$key] = $value;
			}else{
				$return_array[$key] = NULL;
			}
		}
		return $return_array;
	}

	private function uploadfile($fieldName) {
		$config['upload_path']          = './uploads/';
	    $config['allowed_types']        ="pdf|doc|docx|PDF|DOC|DOCX|xls|xlsx";
	    $config['max_size']             = 200000;
	    $this->load->library('upload', $config);
 		if ( ! $this->upload->do_upload($fieldName))
		{
		   return $this->upload->display_errors();

		}
		else
		{
		    return $this->upload->data();
		}
	}

	private function fileDelete($fileName) {
		if ($fileName !='') {
			$delete_file = './uploads/'.$fileName;
			if (file_exists($delete_file)) {
				unlink($delete_file);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	private function validateMemberform() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Full name', 'required');
    $this->form_validation->set_rules('surname', 'Surname', 'required');
    $this->form_validation->set_rules('id_number', 'ID Number', 'required');

		return !$this->form_validation->run() ? true : false;
	}
}
