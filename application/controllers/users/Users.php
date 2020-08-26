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
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		$new_user = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'password' => sha1($randomString),
			'create_date' => date('Y-m-d'),
		);

		$result = $this->UsersModel->create($new_user);

		$mail_settings = Array(
			'protocol'    => 'smtp',
			'smtp_host'   => 'smtp.googlemail.com',
			'smtp_port'   => '587',
			'smtp_user'   => 'testyasipro@gmail.com',
			'smtp_pass'   => 'Yasiru@[1234]',
			'mailtype'    => 'html',
			'smtp_crypto' => 'tls',
			'charset'     => 'utf-8',
			'newline'     => "\r\n"
		);
		$this->load->library('email', $mail_settings);
		$this->email->from('admin@biogreen.lk', 'Bio Green Holdings (Pvt) Ltd');
		$this->email->to('imeshujith@gmail.com');
		$this->email->set_mailtype("html");
		$this->email->subject('');
		$this->email->message('');
		$this->email->send();

		redirect('users/users');

	}

	public function check_email(){
		$email = $this->input->post('email');
		$result=$this->UsersModel->check_email($email);
		if($result){
			echo json_encode($result);
		}
	}
}
