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

	function total_member_count() {
		$q = $this
		->db
		->select('count(*) as count')
		->from('user')
		->where('status', 1)
		->get()
		->row_array();
	  return $q['count'];
	}

	function total_active_member_count() {
		$q = $this
		->db
		->select('count(*) as count')
		->from('user')
		->where('status', 1)
		->where('policy_status', 1)
		->get()
		->row_array();
		return $q['count'];
	}

	function total_lapsed_member_count() {
		$q = $this
		->db
		->select('count(*) as count')
		->from('user')
		->where('policy_status', 0)
		->where('current_month_payment_status', 0)
		->get()
		->row_array();
		return $q['count'];
	}

	function get_depandants($member_id) {
		$q = $this
		->db
		->select('*')
		->from('dependents')
		->where('member_id !=', 0)
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
		$added = $this->db->insert('user', $new_member);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
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
