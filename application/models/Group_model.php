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
	
	/**
	 * Get Single Group
	 * @param - id(int)
	 */
	public function get_single_group($id){
		$this->db->where('id',$id);
		$query = $this->db->get('groups');
		$group = $query->row();
		return $group;
	}
	
	/**
	 * Add New Group
	 * @param - data(array)
	 */
	public function insert($data){
		if($this->db->insert('groups',$data)){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Edit Group
	 * @param - id(int)
	 * @param - data(array)
	 */
	public function update($id,$data){
		$this->db->where('id', $id);
		if($this->db->update('groups',$data)){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Delete Group
	 * @param - id(int)
	 */
	public function delete($id){
		$this->db->where('id',$id);
		if($this->db->delete('groups')){
			return true;
		} else {
			return false;
		}
	}

	
}
?>