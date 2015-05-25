<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends TCMS_Controller{
	public function index(){
		//Get Categoires
		$data['categories'] = $this->Categories_model->get_categories('id','DESC');
		
		//Loading Views
		$data['main_content'] = 'admin/categories/index';
		$this->load->view('admin/layouts/main',$data);
	}
}
