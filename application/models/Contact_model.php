<?php 

class Contact_model extends CI_Model{

    public function saveContact($data){

        $result = $this->db->insert($data);
        if($result->affected_rows() == 1){

            echo true;
        }else{

            echo false;
        }
    }
}


?>