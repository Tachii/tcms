<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends TCMS_Controller {
	public function index(){
		//Getting data
		$data['groups'] = $this->Groups_model->get_groups();
		
		//Load View
		$data['main_content'] = 'admin/users/index';
		$this->load->view('admin/layouts/main',$data);
	}
	
	public function add(){
		
		//Validation Rules
		$this->form_validation->set_rules('firsname', 'First Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('group', 'User Group', 'required');
		
	
	}
	
}