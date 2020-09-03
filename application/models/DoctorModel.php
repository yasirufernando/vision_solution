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

	public function get_doctors($id){
		$this->db->from('doctors')->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function update_doctor($id, $update_new_doctor){
		$this->db->where('id', $id);
		$this->db->update('doctors', $update_new_doctor);
		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete_doctor($id){
		$this->db->where('id', $id);
		$this->db->delete('doctors');
		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public function active_doctor($id){
		$this->db->where('id', $id);
		$this->db->update('doctors', array('status' => 1));
		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public function inactive_doctor($id){
		$this->db->where('id', $id);
		$this->db->update('doctors', array('status' => 0));
		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}


}
