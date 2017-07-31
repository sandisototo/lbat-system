<?php

class Admin_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function validate_admin($username,$password) {
		$q = $this
		->db
		->select('*')
		->from('admin')
		->where('username', $username)
		->get()
		->row_array();
	  return $q;
	}

	function create_admin($user_id,$username,$password) {
		$this->load->library('bcrypt_lib');

		$data = array(
			'user_id'=>$user_id,
			'username'=>$username,
			'password'=>$this->bcrypt_lib->hash($password)
		);
		$q = $this->db->insert('admin',$data);
		return $this->db->insert_id();
	}

	function track_login($mysql_data) {
		return $this->db->insert('login', $mysql_data);
	}
	// Edit Admin
	function edit_admin() {}

	// Remove Admin
	function remove_admin() {}

	//for testing please use the below code to create hash for test user passowrd
	/*
	*		$this->load->library('bcrypt_lib');
	*		$data = $this->bcrypt_lib->hash('test');
	*		print_r($data);
	*
	*/

	function get_all() {
		
		$query = $this->db->get('admin');
        $q = $query->result_array();
	  return $q;
	}

	function updatePassword($user){
		
		$this->load->library('bcrypt_lib');
		$data = $this->bcrypt_lib->hash($user['password']);
		$this->db->where('id',$user['id']);
		$query = ['password'=>$data];
		return $this->db->update('admin', $query);
	}
}
