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
		->where('password', $password)
		->get()
		->row_array();
	  return $q;
	}

	function create_admin($user_id,$username,$password) {
		$data = array(
			'user_id'=>$user_id,
			'username'=>$username,
			'password'=>$password
		);
		$q = $this->db->insert('admin',$data);
		return $this->db->insert_id();
	}

	// Edit Admin
	function edit_admin() {}

	// Remove Admin
	function remove_admin() {}
}
