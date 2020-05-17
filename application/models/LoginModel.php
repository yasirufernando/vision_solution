<?php


class LoginModel extends CI_Model {

	public function select_user($data){
			$condition = array(
				'email' => $data['email'],
				'password' => $data['password']

			);
		// select * from users where $condition
			$query = $this->db->select("*")->from("users")->where($condition);

		// Out put
			$result = $query->get()->result_array(); // row 1

			// check wheather if user available
		if(count($result) == 1 ){
			return true;
		}else{
			return false;
		}


	}
}

