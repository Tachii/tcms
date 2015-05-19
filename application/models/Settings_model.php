<?php
    class Settings_model extends CI_Model {
    	
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
		
		public function get_global_settings(){
			$query = $this->db->get('settings');
			$settings = $query->result();
			return $settings;
		}
		
	}
?>