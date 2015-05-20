<?php
    class Article_model extends CI_Model {
    	
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		
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
			$this->db->select('article.*,category.name as category_name, user.first_name, user.last_name');
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
		 * Get Categories
		 * @param 
		 */
		
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
		 * @param id(int)
		 */
		public function get_single_article($id){
			$this->db->where('id',$id);
			$query = $this->db->get('articles');
			$article = $query->row();
			return $article;
		}
		
		
	}
?>