<?php
    class Article_model extends CI_Model {
    	
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		
		public function get_articles()
		{
			echo 'test';
		}
	}
?>