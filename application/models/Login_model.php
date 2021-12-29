<?php 

class Login_model extends CI_Model{

    public function loginUser($email,$password){

        $this->db->where('email',$email);
        $result = $this->db->get('users');
        if($result->num_rows() > 0){
            foreach($result->result() as $row){
                $dbpassword = $row->password;
                $uid = $row->uid;
                $username = $row->username;
            }
           
            if(password_verify($password,$dbpassword)){
                $this->session->set_userdata('uid',$uid);
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('email',$email);
                $this->session->set_userdata('isLoggedIn',TRUE);
                echo true;
            }else{
                echo false;
            }
        }else{
            echo false;
        }
    }
    
}


?>