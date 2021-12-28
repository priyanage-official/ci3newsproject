<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {


    public function index(){
        
        $this->load->view('layouts/header_view');
		$this->load->view('layouts/navbar_view');
        $this->load->view('contact_view');
        $this->load->view('layouts/footer_view');
    }

    public function contactForm(){

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('subject','Subject','required');
        $this->form_validation->set_rules('message','Message','required');

        if($this->form_validation->run()){
            
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
            ];

            $this->load->model('contact_model');
            $result = $this->contact_model->saveContact($data);
            if($result){

                $this->session->set_tempdata('success','Your form submitted successfully! We will reach you soon. ',3);
                echo true;
                
            }else{
                $this->session->set_tempdata('error','Something went wrong!',3); 
                echo false;
            }
            
        }else{

            echo json_encode(false);
        }
    }
}


