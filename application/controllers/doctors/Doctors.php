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
		$this->load->model('SubjectModel');
	}

	public function index()
	{
		$data = array(
			'doctors' => $this->DoctorModel->selectdoc(),
			'cities' => $this->CitiesModel->select_cities(),
			'districts' => $this->DistrictsModel->select_districts(),
			'provinces' => $this->ProvincesModel->select_provinces(),
			'subject' => $this->SubjectModel->select_subject()
		);

//		$data = array(
//			'subjects' => $this->SubjectModel->select_subject(),
//		);


		$this->load->view('header');
		$this->load->view('doctors/doctors', $data);
		$this->load->view('footer');
	}

	public function add_doctor(){
		$new_doctor = array(
			'salutation' => $this->input->post('salutation'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'doctor_subject' => $this->input->post('doctor_subject'),
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

//	notification massage for after create a doctor
		if($result == true){
			$alert = array(
				'type' => "success",
				'massage' => "Successfully Created Doctor",
			);
			$this->session->set_flashdata('alert', $alert);
			redirect('doctors/doctors');
		}

	}

 /*view eke script eke tyna ajax eke city eka load kranna get mathod eken*/
	public function get_postal_code(){
		$city = $this->input->get('city');
		$result = $this->DoctorModel->get_postal_code($city);
		echo json_encode($result);
	}

	public function get_province(){
		$district =$this->input->get('district');
		$result = $this->DistrictsModel->get_province($district);
		echo json_encode($result);
	}

	public function get_doctor_subject(){
		$doctor_subject = $this->input->get('doctor_subject');
		$result = $this->DoctorModel->get_postal_code($doctor_subject);
		echo json_encode($result);
	}

	public function update_doctors(){
		$id = $this->input->post('id');
		$result = $this->DoctorModel->get_doctors($id);
		echo json_encode($result);
	}

	public function update_doctor(){
		$id = $this->input->post('id');
		$update_new_doctor = array(
			'salutation' => $this->input->post('salutation'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'street' => $this->input->post('street'),
			'address_two' => $this->input->post('address_two'),
			'city' => $this->input->post('city'),
			'postal' => $this->input->post('postal'),
			'district' => $this->input->post('district'),
			'province' => $this->input->post('province'),
		);
		$result = $this->DoctorModel->update_doctor($id, $update_new_doctor);
		if($result == true){
			$alert = array(
				'type' => "success",
				'massage' => "Successfully Updated Doctor",
			);
			$this->session->set_flashdata('alert', $alert);
			redirect('doctors/doctors');
		}
	}
//	public function get_subject(){
//		$result = $this->DoctorModel->get_subject();
//		echo json_encode($result);
//	}

	public function delete_doctor(){
		$id = $this->input->post('delete_id');
		$result = $this->DoctorModel->delete_doctor($id);
		if($result == true){
			$alert = array(
				'type' => "success",
				'massage' => "Successfully Delete Doctor",
			);
			$this->session->set_flashdata('alert', $alert);
			redirect('doctors/doctors');
		}
	}

	public function active_doctor(){
		$id = $this->input->post('id');
		$result = $this->DoctorModel->active_doctor($id);
		if($result == true){
			$alert = array(
				'type' => "danger",
				'massage' => "Successfully Deactivated",
			);
			$this->session->set_flashdata('alert', $alert);
			redirect('doctors/doctors');
		}

	}

	public function inactive_doctor(){
		$id = $this->input->post('id');
		$result = $this->DoctorModel->inactive_doctor($id);
		if($result == true){
			$alert = array(
				'type' => "success",
				'massage' => "Successfully Activated",
			);
			$this->session->set_flashdata('alert', $alert);
			redirect('doctors/doctors');
		}
	}




}
