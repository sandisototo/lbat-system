<?php

class Getter_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_all_transactions($user_id){
		$q = $this
		->db
		->select('user.id, user.name,user.surname,user.cell_number,transaction.id as transaction_id, transaction.amount_paid, transaction.status, transaction.due_date, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
		->from('transaction')
		->join('user', 'user.id = transaction.helper_user_id', 'left')
    ->join('account', 'account.user_id = user.id', 'left')
		->where('transaction.getter_user_id', $user_id)
		->order_by('amount_paid')
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

	function update_transaction($helper_id, $getter_id, $transaction_id){
 		$data = array(
 							 'status' => 2
 			 );
 			 $this->db->where('id', $transaction_id);
 			 $this->db->update('transaction', $data);

			 $data = array(
									'tranction_status' => 2
					);
			$this->db->where('user_id', $getter_id);
      $this->db->update('user_status', $data);

			$data = array(
								 'tranction_status'=> 0
				 );
		 $this->db->where('user_id', $helper_id);
		 $this->db->where('tranction_status', 1);
		 return $this->db->update('user_status', $data);
 	}
}
