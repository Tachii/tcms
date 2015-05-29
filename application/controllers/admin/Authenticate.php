<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authenticate extends TCMS_Controller{
		
	public function login(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			//Load View
			$this->load->view('admin/layouts/login');
		} else {
			//Get Form Data
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			//Validate Username & Password
			$user= $this->Authenticate_model->login($username,$password);
			
			$user_data = array(
				'user_id' => $user->id,
				'username' => $username,
				'logged_in' => true
			);
			//Set session userdata
			$this->session->set_userdata($user_data);
			
			//Set message 
			$this->session->set_flashdata('pass_login','You are now logged in');
			redirect('admin/dashboard');
				
		}
		
	}
	
	public function logout(){
		//Unset User Data
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		
		redirect('admin/authenticate/login');
	}
}
