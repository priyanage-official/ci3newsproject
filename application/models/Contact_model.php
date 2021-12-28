<?php 

class Contact_model extends CI_Model{

    public function saveContact($data){

        $this->db->insert('contact',$data);
        return $this->db->insert_id();
    }
}


?>