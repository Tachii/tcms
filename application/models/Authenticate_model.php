<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authenticate_model extends CI_Model {
	
    public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
    }
	
	/** 
	 * Login 
	 * @param - username(string)
	 * @param - password(string)
	 */
	public function login($username,$password){
		//Secure Password
		$enc_password = md5($password);
		
		//Validate
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		
		if($result->num_rows() == 1){
			$user = $result->row();	
			return $user;
		} else {
			return false;
		}
	}
}
?>