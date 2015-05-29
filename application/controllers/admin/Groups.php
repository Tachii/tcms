<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Groups extends TCMS_Controller{
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
		//Get Categoires
		$data['groups'] = $this->Group_model->get_groups();
		
		//Loading Views
		$data['main_content'] = 'admin/groups/index';
		$this->load->view('admin/layouts/main',$data);
	}
	
	/**
	 * Add group
	 */
	public function add(){
		//Validation Rules
		$this->form_validation->set_rules('name','Groups','trim|required|min_length[4]|xss_clean');
		
		//Checking if form was validated
		if($this->form_validation->run() === FALSE){
			//Views
			$data['main_content'] = 'admin/groups/add';
			$this->load->view('admin/layouts/main',$data);
		} else {
			//Set data
			$data =  array('name' => $this->input->post('name'));
			
			//Insert data into groups Table
			if($this->Group_model->insert($data)){
				
				//Create Notification
				$this->session->set_flashdata('group_saved','New Group Was Added');
				
				//Redirect
				redirect('admin/groups');
			} else {
				//Create Notification
				$this->session->set_flashdata('group_saved_error','Group was not saved');
				
				//Redirect
				redirect('admin/groups');
			}
		}
	}
	
	/**
	 * Edit group
	 * @param - id(int)
	 */
	public function edit($id){
		if(empty($id)){
			redirect('admin/groups');
		}
		
		//To display data in form
		$data['group'] = $this->Group_model->get_single_group($id);
		
		//Validation Rules
		$this->form_validation->set_rules('name','group','trim|required|min_length[4]|xss_clean');
		
		if(!empty($data['group'])){
			//Checking if form was validated
			if($this->form_validation->run() === FALSE){
				//Views
				$data['main_content'] = 'admin/groups/edit';
				$this->load->view('admin/layouts/main',$data);
			} else {
				//Set data
				$data =  array('name' => $this->input->post('name'));
				
				//Insert data into groups Table
				if($this->Group_model->update($id,$data)){
					
					//Create Notification
					$this->session->set_flashdata('group_saved','Group was saved!');
					
					//Redirect
					redirect('admin/groups');
				} else {
					//Create Notification
					$this->session->set_flashdata('group_saved_error','Group was not saved!');
					
					//Redirect
					redirect('admin/groups');
				}
			}
		} else {
			//Redirect
			redirect('admin/groups');
		}
	
	}

	/**
	 * Delete group
	 * @param - id(int);
	 */
	public function delete($id){
		
		if($this->Group_model->delete($id)){
			//Create Message & Redirect
			$this->session->set_flashdata('group_deleted', 'Group has been deleted');
			redirect('admin/groups');
		} else{
			//Create Message & Redirect
			$this->session->set_flashdata('group_deleted_error', 'Group has not been deleted');
			redirect('admin/groups');
		}
		
		
		
	}
	
}
