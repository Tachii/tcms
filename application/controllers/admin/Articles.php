<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends TCMS_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function index()
	{
		//Get Articles
		$data['articles'] = $this->Article_model->get_articles('id','DESC','10');
		
		//Get Navbar Items
		$data['navbar_items'] = $this->Article_model->get_navbar_items();
		
		//Load View
		$data['main_content'] = 'admin/articles/index';
		$this->load->view('admin/layouts/main',$data);
	}
	
	
	/**
	 * Load single article view
	 * @param id(int) 
	 */
	public function view($id){
		//Get Navbar Items
		$data['navbar_items'] = $this->Article_model->get_navbar_items();
		
		//Get Single Article
		$data['article'] = $this->Article_model->get_single_article($id);
		
		//Load View
		$this->load->view('inner',$data);
	}
}