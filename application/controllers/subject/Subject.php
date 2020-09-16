<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SubjectModel');

	}

	public function index()
	{
		$data = array(
			'subjects' => $this->SubjectModel->select_subject(),
		);

		$this->load->view('header');
		$this->load->view('subject/subject', $data);
		$this->load->view('footer');
	}

	public function create_subject(){
		$new_subject = array (
			'doctor_subject' => $this->input->post('doctor_subject'),
			'color' => $this->input->post('doctor_color'),
		);

		$result  = $this->SubjectModel->create_subject($new_subject);

		if($result){
			redirect('subject/subject');
		}
	}


}
