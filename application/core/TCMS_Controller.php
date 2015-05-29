<?php
//Global Controller
class TCMS_Controller extends  CI_Controller{
	public function __construct(){
		parent::__construct();
		if( ! $this->session->userdata('logged_in')){
			redirect('admin/authenticate/login');
		}
		//Loop to get all settings in the "globals" table
		foreach($this->Settings_model->get_global_settings() as $result){
			$this->global_data[$result->key] = $result->value;
		}
	}
}

class INDEX_Controller extends  CI_Controller{
	public function __construct(){
		parent::__construct();
		//Loop to get all settings in the "globals" table
		foreach($this->Settings_model->get_global_settings() as $result){
			$this->global_data[$result->key] = $result->value;
		}
	}
}

