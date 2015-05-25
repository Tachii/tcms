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
	
	/**
	 * Add Category
	 */
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('name','Category','trim|required|min_length[4]|xss_clean');
		
		//Checking if form was validated
		if($this->form_validation->run() === FALSE){
			//Views
			$data['main_content'] = 'admin/categories/add';
			$this->load->view('admin/layouts/main',$data);
		} else {
			//Set data
			$data =  array('name' => $this->input->post('name'));
			
			//Insert data into Categories Table
			if($this->Categories_model->insert($data)){
				
				//Create Notification
				$this->session->set_flashdata('category_saved','Your category was saved!');
				
				//Redirect
				redirect('admin/categories');
			} else {
				//Create Notification
				$this->session->set_flashdata('category_saved_error','Your category was not saved!');
				
				//Redirect
				redirect('admin/categories');
			}
		}
	}
	
	/**
	 * Edit Category
	 * @param - id(int)
	 */
	public function edit($id){
		if(empty($id)){
			$this->session->set_flashdata('category_saved_error','Category with such id doesn\'t exist');
			redirect('admin/categories');
		}
		
		//To display data in form
		$data['category'] = $this->Categories_model->get_single_category($id);
		
		//Validation Rules
		$this->form_validation->set_rules('name','Category','trim|required|min_length[4]|xss_clean');
		
		//Checking if form was validated
		if($this->form_validation->run() === FALSE){
			//Views
			$data['main_content'] = 'admin/categories/edit';
			$this->load->view('admin/layouts/main',$data);
		} else {
			//Set data
			$data =  array('name' => $this->input->post('name'));
			
			//Insert data into Categories Table
			if($this->Categories_model->update($id,$data)){
				
				//Create Notification
				$this->session->set_flashdata('category_saved','Your category was saved!');
				
				//Redirect
				redirect('admin/categories');
			} else {
				//Create Notification
				$this->session->set_flashdata('category_saved_error','Your category was not saved!');
				
				//Redirect
				redirect('admin/categories');
			}
		}
	
	}

	/**
	 * Delete Category
	 * @param - id(int);
	 */
	public function delete($id){
		
		if($this->Categories_model->delete($id)){
			//Create Message & Redirect
			$this->session->set_flashdata('category_deleted', 'Category has been deleted');
			redirect('admin/categories');
		} else{
			//Create Message & Redirect
			$this->session->set_flashdata('category_deleted_error', 'Category has not been deleted');
			redirect('admin/categories');
		}
		
		
		
	}
	
}
