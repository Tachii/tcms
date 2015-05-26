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
}