<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends TCMS_Controller{
	public function __construct(){
		parent::__construct();
		if( ! $this->session->userdata('logged_in')){
			redirect('admin/authenticate/login');
		}
		//Loop to get all settings in the "globals" table
		foreach($this->Settings_model->get_global_settings() as $result){
			$this->global_data[$result->key] = $result->value;
		}
	}
	
	public function index(){
		//Get Articles
		$data['articles'] = $this->Article_model->get_articles('id', 'DESC', 10);
		
		//Get Categories
		$data['categories'] = $this->Categories_model->get_categories('id', 'DESC', 5);
		
		//Get Users
		$data['users'] = $this->User_model->get_users('id', 'DESC', 5);
		
		//Load View
		$data['main_content'] = 'admin/dashboard/index';
		$this->load->view('admin/layouts/main',$data);
		
	}
}
