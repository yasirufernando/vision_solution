<?php


class ProvincesModel extends CI_Model {

	public function select_provinces(){
		$this->db->from('provinces'); // what table- table define
		$this->db->order_by('name_en','asd'); //order by name or something
		$query = $this->db->get(); // get all data from that table
		return $query->result(); // return data
	}

}
