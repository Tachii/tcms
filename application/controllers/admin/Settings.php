<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends TCMS_controller{
	public function index(){
		//Load View
		$data['settings'] = $this->Settings_model->get_global_settings();
		$data['main_content'] = 'admin/settings/index';
		$this->load->view('admin/layouts/main',$data);
	}
	
	/**
	 * Edit Setting Value
	 * @param - id(int)
	 */
	public function edit($id){
		if(empty($id)){
			$this->session->set_flashdata('setting_saved_error','setting with such id doesn\'t exist');
			redirect('admin/settings');
		}
		
		//To display data in form
		$data['setting'] = $this->Settings_model->get_single_setting($id);
		
		//Validation Rules
		$this->form_validation->set_rules('name','setting','trim|required|min_length[4]|xss_clean');
		
		if(!empty($data['setting'])){
			//Checking if form was validated
			if($this->form_validation->run() === FALSE){
				//Views
				$data['main_content'] = 'admin/settings/edit';
				$this->load->view('admin/layouts/main',$data);
			} else {
				//Set data
				$data =  array('value' => $this->input->post('value'));
				
				//Insert data into settings Table
				if($this->Settings_model->edit($id,$data)){
					
					//Create Notification
					$this->session->set_flashdata('setting_saved','Your setting was saved!');
					
					//Redirect
					redirect('admin/settings');
				} else {
					//Create Notification
					$this->session->set_flashdata('setting_saved_error','Your setting was not saved!');
					
					//Redirect
					redirect('admin/settings');
				}
			}
		} else {
			//Redirect
			redirect('admin/settings');
		}
	
	}
}
