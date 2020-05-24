<?php


class DistrictsModel extends CI_Model {

	public function select_districts(){
		$this->db->from('districts'); // what table- table define
		$this->db->order_by('name_en','asd');
		$query = $this->db->get(); // get all data from that table
		return $query->result(); // return data
	}

}
