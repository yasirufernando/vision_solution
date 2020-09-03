<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PatientModel');
	}

	public function index()
	{

		$data = array(
			'patients' => $this->PatientModel->selectpatient()
		);
		$this->load->view('header');
		$this->load->view('patients/patients', $data);
		$this->load->view('footer');
	}

	public function add_patient(){
		$new_patient = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'nic' => $this->input->post('nic'),
			'create_date' => date('Y-m-d'),
		);

		$result = $this->PatientModel->create($new_patient);

		if($result == true){
			redirect('patients/patients');
		}

	}

}
