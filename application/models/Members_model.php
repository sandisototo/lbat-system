<?php

class Members_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get($member_id) {
		$q = $this
		->db
		->select('*')
		->from('user')
		->where('id', $member_id)
		->get()
		->row_array();
		return $q;
	}

	function all() {
		$q = $this
		->db
		->select('*')
		->from('user')
		->where('status', 1)
		->get()
		->result_array();
	  return $q;
	}

	function get_depandants($member_id) {
		$q = $this
		->db
		->select('*')
		->from('dependents')
		->where('member_id', $member_id)
		->where('status', 1)
		->get()
		->result_array();
	  return $q;
	}

	function edit($member_id, $mysql_data) {
		$this->db->where('id',$member_id);
		return $this->db->update('user', $mysql_data);
	}

	function edit_depandant($depandant_id, $mysql_data) {
		$this->db->where('id',$depandant_id);
		return $this->db->update('dependents', $mysql_data);
	}

	function add($new_member)
	{
			return $this->db->insert('user', $new_member);
	}

	function add_depandant($new_dependent)
	{
			return $this->db->insert('dependents',$new_dependent);
	}

	function remove($member_id){
		$mysql_data = array('status' => 0);
		$this->db->where('id',$member_id);
		return $this->db->update('user', $mysql_data);
	}

	function remove_depandant($depandant_id){
		$mysql_data = array('status' => 0);
		$this->db->where('id',$depandant_id);
		return $this->db->update('dependents', $mysql_data);
	}
}
