<?php


class PatientModel extends CI_Model {

	public function selectpatient(){
		$this->db->from('patients'); // what table- table define
		$query = $this->db->get(); // get all data from that table
		return $query->result(); // return data
	}

	public function create($new_patient){
		$this->db->insert('patients', $new_patient);

		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

}
