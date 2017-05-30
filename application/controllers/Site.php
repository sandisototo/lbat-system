<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

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
		$this->load->model('admin_model', 'admin');
		$user_session = $this->session->get_userdata();
		$user_data = $user_session['user'];
		$is_logged_in = $user_data['is_logged_in'];
		if(!isset($is_logged_in) || $is_logged_in != true){
			redirect('logout');
		}
	 }

	 public function index() {
		$this->load->view('index');
	 }
}
