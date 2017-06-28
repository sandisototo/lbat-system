<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stats extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct() {
		 parent::__construct();
		 $this->_is_logged_in();
	 }

	private function _is_logged_in() {
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$is_logged_in = $user_data['is_logged_in'];
		if (!isset($is_logged_in) || $is_logged_in != true) {
			 redirect('logout');
		}
	}

	//All members
	public function all() {
    $stats['total_member_count'] = $this->total_member_count();
    $stats['total_active_member_count'] = $this->total_active_member_count();
    $stats['lapsed_member_count'] = $this->total_lapsed_member_count();
    $stats['total_due_count'] = $this->total_due_count();
		echo json_encode($stats);
	}

  public function total_member_count() {
    $this->load->model('members_model', 'members');
    $count = $this->members->total_member_count();
    return (int)$count;
  }

  public function total_active_member_count() {
    $this->load->model('members_model', 'members');
    $count = $this->members->total_active_member_count();
    return (int)$count;
  }

  public function total_lapsed_member_count() {
    $this->load->model('members_model', 'members');
    $count = $this->members->total_lapsed_member_count();
    return (int)$count;
  }
  // Total due for the month
  public function total_due_count() {
    $this->load->model('payments_model', 'payments');
    $count = $this->payments->total_due_count();
    return (int)$count;
  }
}
