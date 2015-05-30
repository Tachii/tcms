<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {
	
    public function __construct(){
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
		$this->db->select('users.id, first_name, last_name, username, email, password,groups.name AS group_name');
		$this->db->from('users');
		$this->db->join('groups', 'groups.id=users.group_id', 'INNER');
		
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
	
	/**
	 * Get Single User
	 * @param - id(int)
	 */
	public function get_single_user($id){
		$this->db->where('id',$id);
		$query = $this->db->get('users');
		$user = $query->row();
		return $user;
	}
	
	/**
	 * Check unique username
	 * @param - id(int)
	 * @param - email(string)
	 */
	public function check_unique_email($id='',$email){
		$this->db->where('email', $email);
		if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('users')->num_rows();
	}
	
	
	/**
	 * Check unique username
	 * @param - id(int)
	 * @param - username(string)
	 */
	public function check_unique_email($id='',$username){
		$this->db->where('username', $username);
		if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('users')->num_rows();
	}
	
	/**
	 * Insert User
	 * @param - data(array)
	 */
	public function insert($data){
		if($this->db->insert('users',$data)){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Edit User
	 * @param - id(int)
	 * @param - data(array)
	 */
	public function edit($id, $data){
		$this->db->where('id', $id);
		if($this->db->update('users',$data)){
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Delete User
	 * @param - id(int)
	 */
	public function delete($id){
		$this->db->where('id', $id);
		if($this->db->delete('users')){
			return true;
		} else {
			return false;
		}
	}
}
?>