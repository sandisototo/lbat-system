<?php

class Site_model extends CI_Model
{
	function get_details($user_id)
	{
		$q = $this
		->db
		->select('*')
		->from('user')
		->where('id',$user_id)
		->get()
		->row_array();
		return $q;
	}

	function get_all_getter_count($user_id)
	{
		$q = $this
		->db
		->select('count(*) as count')
		->from('user_status')
		->where('user_type',1)
		->where('user_id !=',$user_id)
		->get()
		->row_array();
		return $q['count'];
	}

	function get_all_herlper_count($user_id)
	{
		$q = $this
		->db
		->select('count(*) as count')
		->from('user_status')
		//->where('user_type', 2)
		->where('user_id !=', $user_id)
		->where('tranction_status',0)
		->get()
		->row_array();
		return $q['count'];
	}

	function get_my_reward_count($user_id)
	{
		$q = $this
			->db
			->select('count(*) as count')
			->from('transaction')
			->where('getter_user_id', $user_id)
			->get()
			->row_array();
		return $q['count'];
	}



}
