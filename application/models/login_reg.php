<?php

class login_reg extends CI_Model{

	function get_info($data)
	{
		//var_dump($data);
		//die('in validate model');
		$query = "SELECT * FROM users WHERE 'username' = ? AND 'password' = ? ";
		$result = $this->db->query($query, array($data['username'], $data['password']));
		if($result->num_rows == 1)
			return $result;
	}

	function register_user($data)
	{
		//var_dump($data);
		//die('in register_user model');
		$query = "INSERT INTO users(first_name, last_name, username, email, password, created_at, updated_at) VALUES((?),(?),(?),(?),(?), NOW(), NOW());";
		$this->db->query($query, array($data['first_name'], $data['last_name'], $data['username'], $data['email'], $data['password']));
	}

	
}

