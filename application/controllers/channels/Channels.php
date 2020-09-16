<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channels extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DoctorModel');
		$this->load->model('ChannelsModel');

	}


	public function index()
	{
		$data = array(
			'doctors' => $this->DoctorModel->selectdoc(),
		);

		$this->load->view('header');
		$this->load->view('channels/channels', $data);
		$this->load->view('footer');
	}

	public function create_appointment(){
		$data = array(
			'doctor_name' => $this->input->post('doctor_name'),
			'schedule_date' => $this->input->post('schedule_date'),
		);
		$result  = $this->ChannelsModel->create_channel($data);
		if($result) {
			echo json_encode($result);
		}
		else {
			echo json_encode(false);
		}
	}

	public function add_channel(){
		$add_channel = array (
			'doctor_id' => $this->input->post('doctor_name'),
			'appointment_date' => $this->input->post('schedule_date'),
			'appointment_number ' => $this->input->post('appointment_number'),
		);
		$result  = $this->ChannelsModel->add_channel($add_channel);
	}


}
