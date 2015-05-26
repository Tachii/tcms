<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends TCMS_Controller {
	public function index(){
		//Getting data
		$data['groups'] = $this->Group_model->get_groups();
		$data['users'] = $this->User_model->get_users();
		
		//Load View
		$data['main_content'] = 'admin/users/index';
		$this->load->view('admin/layouts/main',$data);
	}
	
	public function add(){
		
		//Validation Rules
		$this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('group', 'User Group', 'required');
		
		
		//Load View
		$data['groups'] = $this->Group_model->get_groups();
		$data['main_content'] = 'admin/users/add';
		
		//Checking if form was validated
		if($this->form_validation->run() === FALSE){
			//Views
			$this->load->view('admin/layouts/main',$data);
		} else {
			//Create Articles Data Array
			$data = array(
				'first_name' 		=> $this->input->post('firstname'),
		        'last_name' 		=> $this->input->post('lastname'),
				'username' 			=> $this->input->post('username'),
				'email' 			=> $this->input->post('email'),
				'password' 			=> $this->encrypt->encode($this->input->post('password1')),
				'group_id' 			=> $this->input->post('group')
			);
			
			//Insert into Users Table
			$this->User_model->insert($data);
			
			//Create Notification
			$this->session->set_flashdata('user_saved','User has been added!');
			
			//Redirect
			redirect('admin/users');
		}
	
	}


	/**
	 * Edit user
	 * @param - id(int)
	 */
	public function edit($id){
		if(is_int($id)){ 
	        // check record exists in your table 
	        $result = $this->db->get_where('users',array('id'=>$id));
	
	        // $result will be false if no record found
	        if(empty($result)){
	        	$this->session->set_flashdata('user_saved_error','User with such id doesn\'t exist');
	            redirect('admin/users');
	        }
	    } else{
	    	$this->session->set_flashdata('user_saved_error','User with such id doesn\'t exist');
	        redirect('admin/users');
	    }
			
		//Validation Rules
		$this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('group', 'User Group', 'required');
		
		
		//Load View
		$data['groups'] = $this->Group_model->get_groups();
		$data['user'] = $this->User_model->get_single_user($id);
		$data['main_content'] = 'admin/users/edit';
		
		//Checking if form was validated
		if($this->form_validation->run() === FALSE){
			//Views
			$this->load->view('admin/layouts/main',$data);
		} else {
			//Create Articles Data Array
			$data = array(
				'first_name' 		=> $this->input->post('firstname'),
		        'last_name' 		=> $this->input->post('lastname'),
				'username' 			=> $this->input->post('username'),
				'email' 			=> $this->input->post('email'),
				'password' 			=> $this->encrypt->encode($this->input->post('password1')),
				'group_id' 			=> $this->input->post('group')
			);
			
			//Insert into Users Table
			$this->User_model->update($id,$data);
			
			//Create Notification
			$this->session->set_flashdata('user_saved','User has been added!');
			
			//Redirect
			redirect('admin/users');
		}
	
	}

	/**
	 * Delete User
	 * @param - id(int)
	 */
	public function delete($id){
		if($this->User_model->delete($id)){
			//Create Message
			$this->session->set_flashdata('user_deleted', 'User has been deleted');
			redirect('admin/users');
		} else {
			//Create Message
			$this->session->set_flashdata('user_deleted_error', 'User has not been deleted');
			redirect('admin/users');
		}
		
		
	}
	
}