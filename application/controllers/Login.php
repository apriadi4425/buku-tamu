<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Login extends Base{
	protected $judul = 'Login';
	public function __construct() {
		parent::__construct();
	}
	public function index(){
		$data = $this->data();
		return view('auth/login',$data);
	}

	function validation_credential()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() === TRUE) {
			$this->load->model('login/validation_user');
			if ($this->validation_user->validate() == TRUE) {
				$data='sukses';
			} else {
				$data='error1';
			}
		} else {
			$data='error1';
		}
		echo json_encode($data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}

}
