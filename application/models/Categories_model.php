<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories_model extends CI_Model {
	
    public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
    }
	
	/**
	 * Get Categories
	 * 
	 * @param - order_by(string)
	 * @param - sort(string)
	 * @param - limit(int)
	 * @param - offset(int)
	 * 
	 */
	public function get_categories($order_by = null, $sort='DESC', $limit = null, $offset = 0){
		$this->db->select('*');
		$this->db->from('categories');
		if($limit != null){
			$this->db->limit($limit,$offset);
		}
		if($order_by != null){
			$this->db->order_by($order_by,$offset);
		}
		$query = $this->db->get();
		$categories = $query->result();
		return $categories;
	}
	
	/**
	 * Get Single Category
	 * @param - id(int)
	 */
	public function get_single_category($id){
		$this->db->where('id',$id);
		$query = $this->db->get('categories');
		$category = $query->row();
		return $category;
	}
	
	/**
	 * Add New Category
	 * @param - data(array)
	 */
	public function insert($data){
		if($this->db->insert('categories',$data)){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Edit Category
	 * @param - id(int)
	 * @param - data(array)
	 */
	public function update($id,$data){
		$this->db->where('id', $id);
		if($this->db->update('categories',$data)){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Delete Category
	 * @param - id(int)
	 */
	public function delete($id){
		$this->db->where('id',$id);
		if($this->db->delete('categories')){
			return true;
		} else {
			return false;
		}
	}
	
}
?>