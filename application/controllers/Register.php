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
}
