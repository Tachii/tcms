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
		 */
		public function get_articles($order_by = null, $sort='DESC', $limit = null, $offset = 0)
		{
			$this->db->select('a.*,b.name as category_name, c.first_name, c.last_name');
			$this->db->from('articles as a');
			$this->db->join('categories AS b', 'b.id = a.category_id','left');
			$this->db->join('users as c', 'c.id=a.user_id','left');
			if($limit != null){
				$this->db->limit($limit, $offset);
			}
			if($order_by != null){
				$this->db->order_by($order_by,$sort);
			}
			$query = $this->db->get();
			return $query->result();
		}
	}
?>