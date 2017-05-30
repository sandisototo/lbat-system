<?php

class Site_model extends CI_Model
{
	function get_details($user_id) {
		$q = $this
		->db
		->select('*')
		->from('user')
		->where('id',$user_id)
		->get()
		->row_array();
		return $q;
	}
}
