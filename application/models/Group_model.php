<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Group_model extends CI_Model {
	
    public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
    }
	
	/**
	 * Get Groups
	 * 
	 */
	public function get_groups(){
		$this->db->select('*');
		$this->db->from('groups');
		$query=$this->db->get();
		$groups=$query->result();
		return $groups;
	}
	
}
?>