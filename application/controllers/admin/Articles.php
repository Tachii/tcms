<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Articles extends TCMS_Controller {
	public function index(){
		if(!empty($this->input->post('keywords'))){
			//Get filtered Articles
			die(var_dump(this->input->post('keywords')));
			$data['articles'] = $this->Article_model->get_filtered_articles($this->input->post('keywords'));
			
		} else {
			//Get just all the articles(or limited number)
			$data['articles'] = $this->Article_model->get_articles('id','DESC',10);
		}
		
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
	 * @param - id(int) 
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
	 * Add Article
	 * 
	 */
	public function add(){
		
		//Validation Rules
		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('category_id','Category','required');
		$this->form_validation->set_rules('body','Body','trim|required|xss_clean');
		$this->form_validation->set_rules('access','Access','required');
		$this->form_validation->set_rules('user_id','Author','required');
		$this->form_validation->set_rules('user_id','Author','required');
		$this->form_validation->set_rules('in_navbar','In Navbar','required');
		$this->form_validation->set_rules('is_published','Publish','required');
		
		
		$data['categories'] = $this->Categories_model->get_categories();
		$data['users'] = $this->User_model->get_users();
		$data['groups'] = $this->Groups_model->get_groups();
		
		//Checking if form was validated
		if($this->form_validation->run() === FALSE){
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
	 * Edit Article
	 * @param - id(int)
	 */
	public function edit($id){
		if(empty($id)){
			$this->session->set_flashdata('article_saved_error','Article with such id doesn\'t exist');
			redirect('admin/articles');
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
			$this->session->set_flashdata('article_saved_error','Your article was not saved');
			redirect('admin/articles');
			
		}
		
	}

	/**
	 * Publish Article
	 * @param - id(int)
	 */
	public function publish($id){
		if($this->Article_model->publish($id)){
			//Create Notification stored in Session
			$this->session->set_flashdata('article_published','Article has been published');
			
			//Redirect back to Articles view
			redirect('admin/articles');
		}else{
			//Create Notification stored in Session
			$this->session->set_flashdata('article_published_error','Article has not been published');
			
			//Redirect back to Articles view
			redirect('admin/articles');
		}
	}
	
	/**
	 * Unpublish Article
	 * @param - id(int)
	 */
	public function unpublish($id){
		if($this->Article_model->unpublish($id)){
			//Create Notification stored in Session
			$this->session->set_flashdata('article_published','Article has been unpublished');
			
			//Redirect back to Articles view
			redirect('admin/articles');
		}else{
			//Create Notification stored in Session
			$this->session->set_flashdata('article_published_error','Article has not been unpublished');
			
			//Redirect back to Articles view
			redirect('admin/articles');
		}
	}
	
	/**
	 * Delete Article
	 * @param - id(int)
	 */
	public function delete($id){
		$this->Article_model->delete($id);
		
		//Create Message
		$this->session->set_flashdata('article_deleted', 'Article has been deleted');
		
		redirect('admin/articles');
	}
}