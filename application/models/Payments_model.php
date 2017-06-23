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

	function paid_for_this_month($ids, $mysql_data) {
		$this->db->where_in('id', $ids );
		return $this->db->update('user', $mysql_data);
	}
}
