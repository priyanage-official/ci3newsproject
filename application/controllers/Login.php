<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!empty($this->session->userdata('uid'))){
            redirect(base_url());
        }
    }

	public function index()
	{
		$this->load->view('layouts/header_view');
		$this->load->view('layouts/navbar_view');
		$this->load->view('login_view');
		$this->load->view('layouts/footer_view');

	}

	public function loginForm(){

		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()){

            
			$this->load->model('login_model');
			$result = $this->login_model->loginUser($this->input->post('email'),$this->input->post('password'));

			if($result){
				echo true;
			}else{
				$this->session->set_tempdata('error','Something went wrong!');
				echo false;
			}

		}else{

			$this->session->set_flashdata('error','All fields are required!');
			echo false;
		}
	}

}
