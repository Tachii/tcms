<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
	
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
	
	/**
	 * Get All Users Method
	 * 
	 * @param - (string) $order_by 
	 * @param - (string) $sort
	 * @param - (int) $limit
	 * @param - (int) $offset
	 * 
	 */
	public function get_users($order_by=null, $sort='DESC', $limit = null, $offset=0){
		$this->db->select('*');
		$this->db->from('users');
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by, $offset);
		}
		
		$query=$this->db->get();
		$users=$query->result();
		return $users;
	}
}
?>