<?php

class Payments_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_users() {
		$q = $this
		->db
		->select('*')
		->from('user')
		->get()
		->result_array();
		// echo $this->db->last_query(); die();
	   return $q;
	}
}
