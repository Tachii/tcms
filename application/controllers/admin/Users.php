<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends TCMS_Controller {
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
		//Getting data
		$data['groups'] = $this->Group_model->get_groups();
		$data['users'] = $this->User_model->get_users();
		
		//Load View
		$data['main_content'] = 'admin/users/index';
		$this->load->view('admin/layouts/main',$data);
	}
	/**
	 * Add new User
	 */
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
	 * Check if user with such name already exists
	 * @param - str(string)
	 */
	public function email_check($email)
	{
		if($this->input->post('id'))
        	$id = $this->input->post('id');
    	else
        	$id = '';
		$result = $this->User_model->check_unique_email($id, $email);
		if($result == 0){
			return true;
		} else {
			$this->form_validation->set_message('email_check', 'Such %s is already in use');
			return false;
		}	
	}
	
	/**
	 * Check if user with such name already exists
	 * @param - str(string)
	 */
	public function username_check($username)
	{
		if($this->input->post('id'))
        	$id = $this->input->post('id');
    	else
        	$id = '';
		$result = $this->User_model->check_unique_username($id, $username);
		if($result == 0){
			return true;
		} else {
			$this->form_validation->set_message('username_check', 'Username is already in use');
			return false;
		}	
	}


	/**
	 * Edit user
	 * @param - id(int)
	 */
	public function edit($id){
			
		//Validation Rules
		$this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]|callback_username_check');
		$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('group', 'User Group', 'required');
		
		
		
		//Load View
		$data['groups'] = $this->Group_model->get_groups();
		$data['user'] = $this->User_model->get_single_user($id);
		$data['main_content'] = 'admin/users/edit';
		
		//Checking if form was validated
		if(!empty($data['user'])){
			if($this->form_validation->run() === FALSE){
				//Views
				$this->load->view('admin/layouts/main',$data);
			} else {
				//Create User Data Array
				$data = array(
					'first_name' 		=> $this->input->post('firstname'),
			        'last_name' 		=> $this->input->post('lastname'),
					'username' 			=> $this->input->post('username'),
					'email' 			=> $this->input->post('email'),
					'password' 			=> $this->encrypt->encode($this->input->post('password1')),
					'group_id' 			=> $this->input->post('group')
				);
				
				//Insert into Users Table
				$this->User_model->edit($id,$data);
				
				//Create Notification
				$this->session->set_flashdata('user_saved','User has been updated!');
				
				//Redirect
				redirect('admin/users');
			}
		} else {
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
			redirect('admin/users');
		}
		
		
	}
	
}