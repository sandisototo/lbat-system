<?php

class Login_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function validate_user($username,$password)
	{
		//$encrypted = md5($password);
		$q = $this
		->db
		->select('user.id, user.name,user.surname, user.cell_number, user_status.user_type')
		->from('user')
		->join('user_status', 'user_status.user_id = user.id', 'left')
		->where('username', $username)
		->where('password', $password)
		->get()
		->row_array();
		//echo $this->db->last_query(); die();
	   return $q;
	}

}
