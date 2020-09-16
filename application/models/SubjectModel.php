<?php


class SubjectModel extends CI_Model {

	public function select_subject(){
		$this->db->from('doctor_subject');
			$query = $this->db->get();
		return $query->result();
	}

	public function create_subject($new_subject){
		$this->db->insert('color', $new_subject );

		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

}
