<?php

class Payments_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function unpaid() {
		$q = $this
		->db
		->select('*')
		->from('user')
		->where('status', 1)
		->where('policy_status', 1)
		->where('current_month_payment_status', 0)
		->get()
		->result_array();
	   return $q;
	}
	function paid() {
		$q = $this
		->db
		->select('*')
		->from('user')
		->where('current_month_payment_status', 1)
		->get()
		->result_array();
		 return $q;
	}

	// Update a batch current_month_payment_status
	function paid_for_this_month($ids, $mysql_data) {
		$this->db->where_in('id', $ids );
		return $this->db->update('user', $mysql_data);
	}
	// Update a single current_month_payment_status
	function paid_for_this_month_single($user_id) {
		$mysql_data = array('current_month_payment_status' => 1);
		$this->db->where_in('id', $user_id );
		return $this->db->update('user', $mysql_data);
	}

	// Total due for the month
	function total_due_count(){
		$q = $this
		->db
		->select('count(*) as count')
		->from('user')
		->where('status', 1)
		->where('policy_status', 1)
		->where('current_month_payment_status', 0)
		->get()
		->row_array();
	  return $q['count'];
	}

	function record_payment($mysql_data) {
		return $this->db->insert_batch('payment', $mysql_data);
	}

	function missed_last_month_count() {
		$query = $this->db->query('SELECT count(*) as count FROM payment WHERE YEAR(timestamp) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(timestamp) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');
		$row = $query->row_array();
		return $row['count'];
	}

	function lapsed() {
		$q = $this
		->db
		->select('*')
		->from('user')
		->where('policy_status', 0)
		->where('current_month_payment_status', 0)
		->get()
		->result_array();
		 return $q;
	}

	function reset_to_unpaid($ids, $mysql_data) {
		$this->db->where_in('paid_for_this_month', 1 );
		return $this->db->update('user', $mysql_data);
	}

	function get_history($member_id) {
		$q = $this
		->db
		->select('*')
		->from('payment')
		->where('user_id', $member_id)
		->get()
		->result_array();
		return $q;
	}

	function load_payment($payment) {
		return $this->db->insert('payment', $payment);
	}

	function revert_payment($payment_id) {
		$mysql_data = array('status' => 0);
		$this->db->where('id',$payment_id);
		return $this->db->update('payment', $mysql_data);
	}

	function revert_paid_for_this_month($member_id) {
		$mysql_data = array('current_month_payment_status' => 0);
		$this->db->where_in('id', $member_id );
		return $this->db->update('user', $mysql_data);
	}
}
