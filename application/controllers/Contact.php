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

            $name = $this->input->post('name');
            $email_address = $this->input->post('email');

            
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

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_timeout' => 7,
                    'smtp_user' => 'yourmailid',
                    'smtp_pass' => 'yourmailpassword',
                    'charset' => 'utf-8',
                    'newline' => "\r\n",
                    'crlf' => "\r\n",
                    'mailtype' => 'html'
                );

            
                $subject = "Thank you - Abstract";
                $message = "Hi ".$name."<br><br>Thank your for contacting us. We are glad! We will reach you as soon as possible for your query.<br> Take care.<br>";
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('yourmailid', 'yourname');
                $this->email->to($email_address);
                $this->email->subject($subject);
                $this->email->message($message);
                if($this->email->send()){
                    $this->session->set_tempdata('success','Your form submitted successfully! We will reach you soon. ',3);
                    echo true;
                }else{
                    $this->session->set_tempdata('error','Email not send!',3); 
                    echo $this->email->print_debugger();
                }
                
            }else{
                $this->session->set_tempdata('error','Something went wrong!',3); 
                echo false;
            }
            
        }else{

            $this->session->set_tempdata('error','All Fileds required!',3); 
            redirect(base_url().'contact');
        }
    }
}


