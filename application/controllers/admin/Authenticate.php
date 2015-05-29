<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authenticate extends TCMS_Controller{
	public function login(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('password','Username','trim|required|min_length[4]|xss_clean');
		if($this->form_validation->run()== FALSE) {
			//Loading View
			$this->load->view('admin/layouts/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			//Validate Username & Password
			$user_id = $this->Authenticate_model->login($username, $password);
			
			if($user_id){
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);
			
				//Set session userdata
				$this->session->set_userdata($user_data);
				
				//Set message
				$this->session->set_flashdata('pass_login', 'You are now logged in');
				redirect('admin/dashboard');
			}
		}
	}
}
