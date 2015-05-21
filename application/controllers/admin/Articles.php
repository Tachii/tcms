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
	 
	public function index(){
		//Get Articles
		$data['articles'] = $this->Article_model->get_articles('id','DESC','10');
		
		//Get Categories
		$data['categories'] = $this->Categories_model->get_categories('id', 'DESC', 5);
		
		//Get Users
		$data['users'] = $this->User_model->get_users('id', 'DESC', 5);
		
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

	/**
	 * Add Article Method
	 * @no params
	 */
	public function add(){
		//Validation Rules
		$this->form->validation->set_rules('title','Title','trim|required|max_length[4]|xss_clean');
		$this->form->validation->set_rules('body','Body','trim|required|xss+clean');
		$this->form->validation->set_rules('is_published','Publish','required');
		$this->form->validation->set_rules('category','Category','required');
		
		$data['categories'] = $this->Categories_model->get_categories();
		$data['users'] = $this->User_model->get_users();
		$data['groups'] = $this->Groups_model->get_groups();
		
		//Checking if form was validated
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/articles/add';
			$this->load->view('admin/layouts/main',$data);
		} else {
			//Create Articles Data Array
			$data = array(
				'title' 			=> $this->input->post('title'),
				'body' 				=> $this->input->post('body'),
				'category_id' 		=> $this->input->post('category_id'),
				'user_id' 			=> $this->input->post('user_id'),
				'access' 			=> $this->input->post('access'),
				'is_published' 		=> $this->input->post('is_published'),
				'in_navbar' 		=> $this->input->post('in_navbar'),
				'order' 		=> $this->input->post('order'),
			);			
			
			//Insert into Articles Table
			$this->Article_model->insert($data);
			
			//Create Notification
			$this->session->set_flashdata('article_saved','Your article was saved!');
			
			//Redirect
			redirect('admin/articles');
		}
		
	}
	
}