<?php


class UsersModel extends CI_Model {

	public function select(){
		$this->db->from('users'); // what table- table define
		$query = $this->db->get(); // get all data from that table
		return $query->result(); // return data
	}

	public function create($new_user){
		$this->db->insert('users', $new_user);

		if($this->db->affected_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}

	public function check_email($email){
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->result();
	}


	}

