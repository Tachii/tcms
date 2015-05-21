<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Navbar_model extends CI_Model {
	
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
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
	
}
?>