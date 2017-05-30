<?php

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function new_user($name,$surname,$cell_number,$gender,$password,$username) {
		$data = array(
			'name'=>$name,
			'surname'=>$surname,
			'cell_number'=>$cell_number,
			'gender'=>$gender,
			'password'=>$password,
			'username'=>$username
		);
		$q = $this->db->insert('user',$data);
		return $this->db->insert_id();

	}

	function new_user_emal_ref($name,$surname,$cell_number,$gender,$email,$refferal_number,$password,$username) {
		$data = array(
			'name'=>$name,
			'surname'=>$surname,
			'cell_number'=>$cell_number,
			'gender'=>$gender,
			'email'=>$email,
			'refferal_number'=>$refferal_number,
			'password'=>$password,
			'username'=>$username
		);
		$q = $this->db->insert('user',$data);
		return $this->db->insert_id();

	}
	function new_user_ref($name,$surname,$cell_number,$gender,$refferal_number,$password,$username) {
		$data = array(
			'name'=>$name,
			'surname'=>$surname,
			'cell_number'=>$cell_number,
			'gender'=>$gender,
			'refferal_number'=>$refferal_number,
			'password'=>$password,
			'username'=>$username
		);
		$q = $this->db->insert('user',$data);
		return $this->db->insert_id();
	}
	
	function new_user_emal($name,$surname,$cell_number,$gender,$email,$password,$username) {
		$data = array(
			'name'=>$name,
			'surname'=>$surname,
			'cell_number'=>$cell_number,
			'gender'=>$gender,
			'email'=>$email,
			'password'=>$password,
			'username'=>$username
		);
		$q = $this->db->insert('user',$data);
		return $this->db->insert_id();
	}

	function new_account($user_id,$bank,$branch_code,$account_holder,$account_number,$accout_type) {
		$data = array(
			'user_id'=>$user_id,
			'account_type'=>$accout_type,
			'account_holder'=>$account_holder,
			'bank'=>$bank,
			'branch_code'=>$branch_code,
			'account_number'=>$account_number
		);
		$q = $this->db->insert('account',$data);
		return $this->db->insert_id();
	}







}
