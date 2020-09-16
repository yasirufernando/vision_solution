<?php


class ChannelsModel extends CI_Model {

	public function create_channel($data){
		$this->db->where(array('doctor_id' => $data['doctor_name'], 'appointment_date' => $data['schedule_date'] ));
		$this->db->from('channelings');
		$query = $this->db->get();
		return $query->result();
	}

	public function add_channel($add_channel){
		$this->db->insert('channelings', $add_channel );

		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
}
