<?php


class DoctorModel extends CI_Model {

	public function selectdoc(){
		$this->db->from('doctors'); // what table- table define
		$query = $this->db->get(); // get all data from that table
		return $query->result(); // return data
	}

	public function create($new_doctor){
		$this->db->insert('doctors', $new_doctor);

		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_postal_code($city){
		$this->db->from('cities')->where('name_en', $city);
		$query = $this->db->get();
		return $query->result();
	}


}
