<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article_model extends CI_Model {
	/**
	 * Get Articles
	 * 
	 * @param - order_by(string)
	 * @param - sort(string)
	 * @param - limit(int)
	 * @param - offset(int)
	 * 
	 */
	public function get_articles($order_by = null, $sort='DESC', $limit = null, $offset = 0)
	{
		$this->db->from('articles AS article');
		$this->db->select('article.*,category.name as category_name, user.first_name, user.last_name, user.username');
		$this->db->join('categories AS category', 'category.id = article.category_id','left');
		$this->db->join('users AS user','user.id=article.user_id','left');
		
		
		if($limit != null){
			$this->db->limit($limit, $offset);
		}
		
		if($order_by != null){
			$this->db->order_by($order_by,$sort);
		}
		
		$query = $this->db->get();
		$articles = $query->result();
		return $articles;
	}
	
	/**
	 * Get Navbar Items
	 */
	public function get_navbar_items()
	{
		$this->db->where('in_navbar',1);
		$this->db->order_by('order');
		$query=$this->db->get('articles'); 
		$navbar_items = $query->result();
		return $navbar_items;
	}
	
	/**
	 * Get Single Article
	 * @param - id(int)
	 */
	public function get_single_article($id){
		$this->db->where('id',$id);
		$query = $this->db->get('articles');
		$article = $query->row();
		return $article;
	}
	
	
	/**
	 * Insert Article method
	 * @param data(array)
	 */
	public function insert($data){
		if($this->db->insert('articles',$data)){
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Update Single Article
	 * @param - data(array)
	 * @param - id(int)
	 */
	public function update($data, $id){
		$this->db->where('id', $id);
		
		if($this->db->update('articles',$data)){
			return true;
		} else {
			return false;
		}
	}
	
	/** 
	 * Publish Article
	 * @param - id(int)
	 * @param - data(array)
	 */
	public function publish($id){
		$this->db->where('id',$id);
		if($this->db->update('articles',$data)){
			return true;	
		}
		else {
			return false;
		}
		
	}
}
?>