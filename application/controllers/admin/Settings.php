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
		$this->form_validation->set_rules('value','Value','trim|required|min_length[4]|xss_clean');
		
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
				if($this->Settings_model->update($id,$data)){
					
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

	/**
	 * Upload Logo Image
	 * @param 
	 */
	public function do_upload()
	{
		$data['main_content'] = 'admin/settings/index';
		$this->load->view('admin/layouts/main',$data);
		
		$config['upload_path'] = base_url().'assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->upload->initialize($config);


		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			redirect('admin/settings');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			//$this->load->view('upload_success', $data);
			redirect('admin/settings');
		}
	}
}
