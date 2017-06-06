<?php

class Members_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function all() {
		$q = $this
		->db
		->select('*')
		->from('user')
		->get()
		->result_array();
	  return $q;
	}

	function edit($member_id, $mysql_data) {
		$this->db->where('id',$member_id);
		return $this->db->update('user', $mysql_data);
	}

}
