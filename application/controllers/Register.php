<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('layouts/header_view');
		$this->load->view('layouts/navbar_view');
		$this->load->view('register_view');
		$this->load->view('layouts/footer_view');

	}

	public function registerForm(){

		$this->form_validation->set_rules('fullname','Fullname','required');
		$this->form_validation->set_rules('username','Username','required|min_length[3]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('gender','Gender','required');

		if($this->form_validation->run()){

			$data = [
				'fullname' => $this->input->post('fullname'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'gender' => $this->input->post('gender'),
			];

			$this->load->model('register_model');
			$result = $this->register_model->registerUser($data);

			if($result){
				$this->session->set_tempdata('success','You form submitted successfully!');
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
