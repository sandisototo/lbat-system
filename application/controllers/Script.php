<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Script extends CI_Controller {

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
	 }

	 public function index() {
	 	$this->load->model('admin_model', 'admin');
	 	$admin = $this->admin->get_all();
	 	$updates = [];
	 	foreach ($admin as $user) {
	 		$updates[] = $this->admin->updatePassword($user);
	 	}
		
		return $this->output->set_output(json_encode(array('error' => true, 'message'=> $updates)));
	 }
}
