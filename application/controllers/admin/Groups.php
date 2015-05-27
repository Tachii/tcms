<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Groups extends TCMS_Controller{
	public function index(){
		//Get Categoires
		$data['groups'] = $this->Groups_model->get_groups();
		
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
			if($this->Groups_model->insert($data)){
				
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
			$this->session->set_flashdata('group_saved_error','group with such id doesn\'t exist');
			redirect('admin/groups');
		}
		
		//To display data in form
		$data['group'] = $this->Groups_model->get_single_group($id);
		
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
				if($this->Groups_model->update($id,$data)){
					
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
		
		if($this->Groups_model->delete($id)){
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
