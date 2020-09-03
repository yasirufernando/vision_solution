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
			'smtp_port'   => '465',
			'smtp_user'   => 'shlittab@gmail.com',
			'smtp_pass'   => 'Rukshan@4321',
			'mailtype'    => 'html',
			'smtp_crypto' => 'tls',
			'charset'     => 'utf-8',
			'newline'     => "\r\n"
		);

		$this->load->library('email', $mail_settings);
		$this->email->from('admin@visionsolution.lk', 'Vision Solution System');
		$this->email->to($new_user['email']);
		$this->email->set_mailtype("html");
		$this->email->subject('Invitation for Vision Solution');
		$this->email->message('
   <p>Dear '.$new_user['first_name'].' '.$new_user['last_name'].'</p>
   
   <p>Email: '.$new_user['email'].'</p>
   <p>password: '.$randomString.'</p>
   
      ');
		$this->email->send();

	}

	public function check_email(){
		$email = $this->input->post('email');
		$result=$this->UsersModel->check_email($email);
		if($result){
			echo json_encode($result);
		}
	}
}
