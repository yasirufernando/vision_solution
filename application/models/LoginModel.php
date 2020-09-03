<?php


class LoginModel extends CI_Model {

	public function select_user($data){
		$condition = array(
			'email' => $data['email'],
			'password' => $data['password']

		);
		$this->db->where('email', $data['email']);
		$query = $this->db->get('users');

		if($query->result()){
			$this->db->where($condition);
			$user = $this->db->get('users');

			if($user->result()){
				return true; // email and password check
			}else{
				return false; // password incorrect
			}
		}else{
			return false;
		}

	}
}

