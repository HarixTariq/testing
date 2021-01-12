<?php
class Login_model extends CI_Model
{
    function can_login($email, $password){
        $this->db->where('email',$email);
        $query = $this->db->get('codetable');
        if($query->num_rows() > 0){
            $row = $query->result();
            $store_password=$this->$row->password;
            if($password == $store_password){
                $this->session->set_userdata('id',$row->id);
            }
        }
        else {
            return "Wrong email entered";
        }

    }
}
 ?>
