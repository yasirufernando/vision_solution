<?php


class SchedulesModel extends CI_Model {

	public function create($new_schedule){
		$this->db->insert('schedule', $new_schedule );

		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_schedule(){
		$this->db->select('schedule.*, doctors.salutation as salutation, doctors.first_name as fname, doctors.last_name as lname');
		$this->db->from('schedule');
		$this->db->join('doctors', 'doctors.id = schedule.title');
		$query = $this->db->get();
		return $query->result();
	}

}
