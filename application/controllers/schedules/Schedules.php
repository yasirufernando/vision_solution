<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DoctorModel');
		$this->load->model('SchedulesModel');

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

	public function add_schedules(){
		$new_schedule = array (
			'title' => $this->input->post('doctor_name'),
			'start_event' => $this->input->post('schedule_date'),
			'end_event' => $this->input->post('schedule_date'),
		);

		$result  = $this->SchedulesModel->create($new_schedule);

		if($result){
			redirect('schedules/schedules');
		}
	}

	public function get_schedule(){
		$schedules = $this->SchedulesModel->get_schedule();
		foreach($schedules as $schedule){
			$data[] = array(
				'title' => $schedule->salutation.' '.$schedule->fname.' '.$schedule->lname,
				'start' => $schedule->start_event,
				'end'	=> $schedule->end_event,
				'color' => '#f0ad4e'
			);

		}
		echo json_encode($data);
	}
}

