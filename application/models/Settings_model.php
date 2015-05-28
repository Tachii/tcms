<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings_model extends CI_Model {
	
    public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
    }
	
	public function get_global_settings(){
		$query = $this->db->get('settings');
		$settings = $query->result();
		return $settings;
	}
	
	/** Get single setting
	 *@param - id(int)
	 */
	public function get_single_setting($id){
		$this->db->where('id',$id);
		$query = $this->db->get('settings');
		$category = $query->row();
		return $setting;
	}
}
?>