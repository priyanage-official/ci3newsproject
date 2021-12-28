<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('layouts/header_view');
		$this->load->view('layouts/navbar_view');
		$this->load->view('home_view');
		$this->load->view('layouts/footer_view');

	}
}
