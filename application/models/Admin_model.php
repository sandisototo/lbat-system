<?php

class Admin_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function validate_user($username,$password)
	{
		//$encrypted = md5($password);
		$q = $this
		->db
		->select('user.id, user.name, user.surname, admin.id as admin_id')
		->from('admin')
		->join('user', 'user.id = admin.user_id', 'left')
		->where('admin.username', $username)
		->where('admin.password', $password)
		->get()
		->row_array();
		//echo $this->db->last_query(); die();
	   return $q;
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
		->where('user_status.user_type', 1)
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
	   return $q;
	}

	function get_notification_list(){
		$q = $this
		->db
		->select('getter_request.id, getter_request.request_amount, user.id as user_id, user.name as user_name, user.surname as user_surname, user.cell_number')
		->from('getter_request')
		->join('user', 'user.id = getter_request.user_id', 'left')
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
		 return $q;
	}
function remove_from_notifications($user_id){
	$this->db->where('user_id', $user_id);
	$this->db->delete('getter_request'); 
}
	function get_helper_getter(){
	   $q = $this
	->db
	->select('h.id, h.name,h.surname,g.id as getter_id, g.name as getter_name, g.surname as getter_surname, user_status.user_type,user_status.amount_expected,transaction.amount_paid, transaction.reward_date,transaction.due_date')
	->from('transaction')
	->join('user h', 'h.id = transaction.helper_user_id', 'left')
	->join('user g', 'g.id = transaction.getter_user_id', 'left')
	->join('user_status', 'user_status.user_id = transaction.helper_user_id', 'left')
	->where('user_status.user_type', 2)
	->get()
	->result_array();
	//echo $this->db->last_query(); die();
	  return $q;
	 	}
   function  get_all_users(){
     $q = $this
 		->db
 		->select('user.id, user.name,user.surname, user.cell_number, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code,user_status.amount_expected')
 		->from('user')
    	->join('account', 'account.user_id = user.id', 'left')
    	->join('user_status', 'user.id = user_status.user_id', 'left')
 		->get()
 		->result_array();
 		//echo $this->db->last_query(); die();
 	   return $q;
  }
  function  all_none_getters(){
     $q = $this
 		->db
 		->select('user.id, user.name,user.surname, user.cell_number, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code')
 		->from('user')
   		->join('account', 'account.user_id = user.id', 'left')
    	->where('status', 0)
 		->get()
 		->result_array();
 		//echo $this->db->last_query(); die();
 	   return $q;
  }

   function  get_all_none_getters(){
     $q = $this
 		->db
 		->select('user.id, user.name,user.surname,user.cell_number, user_status.status,user_status.amount_expected, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
 		->from('user_status')
 		->join('user', 'user.id = user_status.user_id', 'left')
     ->join('account', 'account.user_id = user_status.id', 'left')
 		->where('user_status.tranction_status', 1)
 		->get()
 		->result_array();
 		//echo $this->db->last_query(); die();
 	   return $q;
  }

  function  add_to_getters(){
    $q = $this
		->db
		->select('user.id, user.name,user.surname,user.cell_number, user_status.status,user_status.amount_expected, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
		->from('user_status')
		->join('user', 'user.id = user_status.user_id', 'left')
    ->join('account', 'account.user_id = user_status.id', 'left')
		->where('user_status.status', 1)
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
	   return $q;
  }
  function update_user_status($user_id)
	{
		$data = array(
					'status'=>1);
		$this->db->where('id',$user_id);
		$this->db->update('user', $data);
		//echo $this->db->last_query(); die();
	}
  function new_getter($user_id,$amount_expected)
	{
		$data = array('user_id'=>$user_id,
					'user_type'=>1,
					'amount_expected'=>$amount_expected);
		$q = $this->db->insert('user_status',$data);
		//return $q;
		return $this->db->insert_id();

	}

	function  get_user($user_id){
     $q = $this
 		->db
 		->select('user.id, user.name,user.surname, user.cell_number, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code,user_status.amount_expected')
 		->from('user')
    	->join('account', 'account.user_id = user.id', 'left')
    	->join('user_status', 'user.id = user_status.user_id', 'left')
    	->where('user.id',$user_id)
 		->get()
 		->row_array();
 		//echo $this->db->last_query(); die();
 	   return $q;
  	}

 	function get_getter_all_transactions($user_id){
		$q = $this
		->db
		->select('user.id, user.name,user.surname,user.cell_number,transaction.amount_paid, transaction.status, transaction.due_date, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
		->from('transaction')
		->join('user', 'user.id = transaction.helper_user_id', 'left')
    	->join('account', 'account.user_id = user.id', 'left')
		->where('transaction.getter_user_id', $user_id)
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
	   return $q;
	}
	function get_helper_all_transactions($user_id){
		$q = $this
		->db
		->select('user.id, user.name,user.surname,user.cell_number,transaction.amount_paid, transaction.status, transaction.due_date, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
		->from('transaction')
		->join('user', 'user.id = transaction.getter_user_id', 'left')
    	->join('account', 'account.user_id = user.id', 'left')
		->where('transaction.helper_user_id', $user_id)
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
	   return $q;
	}
	function get_all_overdue_transactions($due_date){
		$q = $this
		->db
		->select('user.id, user.name,user.surname,user.cell_number,transaction.amount_paid,transaction.getter_user_id,transaction.helper_user_id,transaction.id,transaction.status, transaction.due_date, account.account_number, account.account_type, account.account_holder, account.bank, account.branch_code ')
		->from('transaction')
		->join('user', 'user.id = transaction.getter_user_id', 'left')
    	->join('account', 'account.user_id = user.id', 'left')
		->where('transaction.due_date >', $due_date)
		->where('transaction.status ', 3)
		->get()
		->result_array();
		//echo $this->db->last_query(); die();
	   return $q;
	}
	function update_transaction_status()
	{

		$data = array(
					'status'=>3);
		$this->db->where('DATE(due_date) < DATE(NOW())');
		$this->db->where('status ', 1);
		$this->db->update('transaction', $data);
		//echo $this->db->last_query(); die();
		return $this->db->affected_rows();

	}
	function update_user_status_to_overdue($getter_user_id)
	{
		$data = array(
					'tranction_status'=>3);
		$this->db->where('user_id',$getter_user_id);
		$this->db->where('tranction_status ', 1);
		$this->db->update('user_status', $data);
		return $this->db->affected_rows();
		//echo $this->db->last_query(); die();
	}

	function admin_update_transaction($admin_id,$helper_id, $getter_id, $transaction_id){

 			 $data = array(
					'status'=>2,
					'helper_user_id'=>$admin_id);
				$this->db->where('id ',$transaction_id);
				$this->db->update('transaction', $data);

			$data = array(
					'tranction_status'=>2,
					'user_id'=>$admin_id);
				$this->db->where('user_id ',$getter_id);
				$this->db->update('user_status', $data);


			$data = array(
					'tranction_status'=>0,
					'user_id'=>$admin_id);
		 $this->db->where('user_id', $helper_id);
		 $this->db->where('tranction_status', 1);
		 return $this->db->update('user_status', $data);
 	}

	 function new_admin($user_id,$username,$password)
	{
		$data = array('user_id'=>$user_id,
					'username'=>$username,
					'password'=>$password);
		$q = $this->db->insert('admin',$data);
		//return $q;
		return $this->db->insert_id();

	}

}
