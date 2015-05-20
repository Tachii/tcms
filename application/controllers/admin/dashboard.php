<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends TCMS_Controller{
	public function index(){
		//Get Articles
		$data['articles'] = $this->Article_model->get_articles('id', 'DESC', 10);
		
		//Get Categories
		$data['categories'] = $this->Article_model->get_categories('id', 'DESC', 5);
		
		//Get Users
		$data['users'] = $this->User_model->get_users('id', 'DESC', 5);
		
		//View
		$data['main_content'] = 'admin/dashboard/index';
		$this->load->view('admin/layouts/main',$data);
		
	}
}
