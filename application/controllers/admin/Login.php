<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends TCMS_Controller{
	public function login(){
		$this->load->view('admin/layouts/login');
	}
}
