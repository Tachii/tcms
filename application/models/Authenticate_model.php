<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authenticate_model extends CI_Model {
	/** 
	 * Login 
	 * @param - username(string)
	 * @param - password(string)
	 */
	public function login($username,$password){
		//Secure Password
		$password = $this->encrypt->encode($password);
		
		//Validate
		$this->db->where('username',$username);
		
		$result = $this->db->get('users');
		
		if($result->num_rows() == 1){
			$user = $result->row();
			return $user;	
		} else {
			return false;
		}
	}
}
?>