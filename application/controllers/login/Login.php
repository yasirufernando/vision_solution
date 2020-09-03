<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
{
		parent::__construct();
		$this->load->model('LoginModel');
}


	public function index()
	{
		$this->load->view('login/login');
	}

public function signup()
	// assign input value to data variable
{
	//check if email or password valid

				$data = array(
	'email' => $this->input->post('email'),
	'password' => $this->input->post('password')
);

	$query_result = $this->LoginModel->select_user($data);


	if($query_result == true){
		$this->session->set_userdata('name', 'Yasiru Fernando');
		redirect('dashboard');
	}
	else{
		$this->session->set_flashdata('alert', true);
		redirect('login/login');

	}
}

public function logout(){
	redirect('login/login');
}
}
