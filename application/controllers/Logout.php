<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{

    public function index(){
        if(!empty($this->session->userdata('uid'))){
       
			$this->session->unset_userdata('uid');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('email');

			redirect(base_url()); 
		}
    }
}

?>