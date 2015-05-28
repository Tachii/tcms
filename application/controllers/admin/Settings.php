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
		//Load View
		$data['setting'] = $this->Settings_model->get_single_setting($id);
		$data['main_content'] = 'admin/settings/edit';
		$this->load->view('admin/layouts/main',$data);
	}
}
