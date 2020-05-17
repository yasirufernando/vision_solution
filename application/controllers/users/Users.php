<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// empty contruct function for decrease data duplication
	public function __construct(){
		parent::__construct();
		$this->load->model('UsersModel');
	}

	public function index(){
		$data = array(
			'users' =>  $this->UsersModel->select()
		);


		$this->load->view('header');
		$this->load->view('users/users', $data);
		$this->load->view('footer');
	}

	public function add_user(){
		$new_user = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'create_date' => date('Y-m-d'),
	);

		$result = $this->UsersModel->create($new_user);

		if($result == true){
				redirect('users/users');
		}

	}
}
