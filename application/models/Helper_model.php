<?php

class Helper_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_all_getters()
	{
		$q = $this
		->db
		->select('user.id, user.name,user.surname,user.cell_number,user_status.user_type, user_status.amount_expected, user_status.timestamp, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
		->from('user_status')
		->join('user', 'user.id = user_status.user_id', 'left')
    ->join('account', 'account.user_id = user.id', 'left')
		->where('user_status.tranction_status', 0)
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
	   return $q;
	}

	function is_added($user_id){
		$q = $this
		->db
		->select('count(*) as count ')
		->from('getter_request')
		->where('user_id', $user_id)
		->get()
		->row_array();
		//echo $this->db->last_query(); die();
	   return $q['count'];
	}


	function add_to_getter_request($user_id,$search_amount){

		$data = array(
							 'user_id' => $user_id,
							 'request_amount' => $search_amount,
			 );

		 return $this->db->insert('getter_request', $data);
	}


	function add_to_my_getters($user_id,$amount_expected,$user_type){

		$data = array(
							 'user_id' => $user_id,
							 'amount_expected' => $amount_expected,
							 'user_type' =>$user_type,
							 'tranction_status' => 1
			 );

		 return $this->db->insert('user_status', $data);
	}

	function new_transaction($user_id,$getter_id, $due_date, $reward_date, $amount_expected){

		$data = array(
							 'helper_user_id' => $user_id,
							 'getter_user_id' => $getter_id,
							 'amount_paid' =>$amount_expected,
							 'status' => 1,
							 'due_date' => $due_date,
							 'reward_date' => $reward_date
			 );
			  //print_r($data); die();
		 return $this->db->insert('transaction', $data);
	}

	function get_all_transactions($user_id){
		$q = $this
		->db
		->select('user.id, user.name,user.surname,user.cell_number,transaction.amount_paid, transaction.status, transaction.due_date, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
		->from('transaction')
		->join('user', 'user.id = transaction.getter_user_id', 'left')
    ->join('account', 'account.user_id = user.id', 'left')
		->where('transaction.helper_user_id', $user_id)
		->order_by('amount_paid', 'DESC')
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
	   return $q;
	}

	function update_transaction_status($getter_id){
		$data = array(
							 'tranction_status' => 1
			 );
			 $this->db->where('user_id', $getter_id);
			 $this->db->update('user_status', $data);
	}
}
