<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DoctorModel');
		$this->load->model('CitiesModel');
		$this->load->model('DistrictsModel');
		$this->load->model('ProvincesModel');
	}

	public function index()
	{
		$data = array(
			'doctors' => $this->DoctorModel->selectdoc(),
			'cities' => $this->CitiesModel->select_cities(),
			'districts' => $this->DistrictsModel->select_districts(),
			'provinces' => $this->ProvincesModel->select_provinces()
		);


		$this->load->view('header');
		$this->load->view('doctors/doctors', $data);
		$this->load->view('footer');

	}

	public function add_doctor(){
		$new_doctor = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'street' => $this->input->post('street'),
			'address_two' => $this->input->post('address_two'),
			'city' => $this->input->post('city'),
			'postal' => $this->input->post('postal'),
			'district' => $this->input->post('district'),
			'province' => $this->input->post('province'),
			'create_date' => date('Y-m-d'),
		);

		$result = $this->DoctorModel->create($new_doctor);

		if($result == true){
			redirect('doctors/doctors');
		}

	}

 /*view eke script eke tyna ajax eke city eka load kranna get mathod eken*/
	public function get_postal_code(){
		$city = $this->input->get('city');
		$result = $this->DoctorModel->get_postal_code($city);
		echo json_encode($result);
	}
}
