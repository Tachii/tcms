<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends TCMS_Controller{
	public function index(){
		$data['main_content'] = 'admin/login';
		$this->load->view('admin/layouts/main',$data);
	}
}
