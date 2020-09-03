<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DoctorModel');

	}

	public function index()
	{
		$data = array(
			'doctors' => $this->DoctorModel->selectdoc(),
		);

		$this->load->view('header');
		$this->load->view('schedules/schedules', $data);
		$this->load->view('footer');
	}
}

