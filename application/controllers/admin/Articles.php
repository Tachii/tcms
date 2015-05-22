<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends TCMS_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }  
	 
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
	 * 
	 */
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('body','Body','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('category_id','Category','required');
		
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
				'order' 			=> $this->input->post('order'),
			);
			
			//Insert into Articles Table
			$this->Article_model->insert($data);
			
			//Create Notification
			$this->session->set_flashdata('article_saved','Your article was saved!');
			
			//Redirect
			redirect('admin/articles');
		}
		
	}
	
	
	/**
	 * Edit Article method
	 * @param id(int)
	 */
	public function edit($id){
		if(empty($id)){
			redirect('admin/articles');
			$this->session->set_flashdata('article_saved','Your article was not saved because id is empty');
		}
		//Form Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('body','Body','trim|required|xss_clean');
		$this->form_validation->set_rules('is_published','Publish','required');
		$this->form_validation->set_rules('category_id','Category','required');
		
		$data['categories'] = $this->Categories_model->get_categories();
		$data['users'] = $this->User_model->get_users();
		$data['groups'] = $this->Groups_model->get_groups();
		$data['article'] = $this->Article_model->get_single_article($id);
		
		if(!empty($data['article'])){
			if($this->form_validation->run() == FALSE){
				//Views
				$data['main_content'] = 'admin/articles/edit';
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
					'order' 			=> $this->input->post('order'),
				);
							
				//Insert into Articles Table
				$this->Article_model->update($data, $id);
				
				//Create Notification
				$this->session->set_flashdata('article_saved','Your article was saved!');
				
				//Redirect
				redirect('admin/articles');
			}
		} else {
			redirect('admin/articles');
			$this->session->set_flashdata('article_saved','Your article was not saved because it didnt find any entries that match request');
		}
		
	}
	
	
}