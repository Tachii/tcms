<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Category_model extends CI_Model {
    	
        public function __construct()
        {
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
		public function get_categories($order_by = null, $sort='DESC', $limit = null, $offset = 0)
		{
			$this->db->select('*');
			$this->db->from('categories');
			if($limit != null){
				$this->db->limit($limit,$offset);
			}
			if($order_by != null){
				$this->db->order_by($order_by,$offset);
			}
			$query = $this->db->get();
			return $query->result();
		}
		
	}
?>