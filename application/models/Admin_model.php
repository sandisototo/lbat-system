<?php

class Admin_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function validate_user($username,$password) {
		$q = $this
		->db
		->select('user.id, user.name, user.surname, admin.id as admin_id')
		->from('admin')
		->join('user', 'user.id = admin.user_id', 'left')
		->where('admin.username', $username)
		->where('admin.password', $password)
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
