<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends TCMS_controller{
	public function index(){
		//Load View
		$data['main_content'] = 'admin/settings/index';
		$this->load->view('admin/layouts/main',$data);
	}
}
