<?php
class User_model extends CI_Model{
    //-----------------------------REGISTER_MODEL-------------------------
    function insert($data){
        $this->db->insert('codetable',$data);
        return $this->db->insert_id();
    }
    //-----------------------------PROFILE_MODEL--------------------------
    function get_data()
    {
            $id = $this->session->userdata('id');
            $this->db->where('id', $id);
            $query = $this->db->get('codetable');  // Produces: SELECT * FROM mytable

            //$query = $this->db->query("SELECT * FROM codetable where ID = '$id'");
            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                    $data = array();
                        $data['name']      =  $row->Name;
                        $data['email']     =  $row->Email;
                        $data['password']  =  $row->password;
                        $data['image']     =  $row->image;
                }
            }
            else {
                echo ("No Record Found");
            }
    return $data;
    }
    function update_data($data1)
    {
        $id = $this->session->userdata('id');
        $this->db->where('id', $id);
        $this->db->update('codetable', $data1);
        $updated_status = $this->db->affected_rows();
        if($updated_status)
        {
            // die("aaaaaaaaaaaaazzzzsssa");
            return "data updated";
        }
        else
        {
            return "Not Updated";
        }
    }

    //---------------------LOGIN_MODEL------------------------
    function can_login($email, $passord)
    {
        $query = $this->db->query("SELECT * FROM codetable where Email = '$email'");
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $store_password = $row->password;
                $this->session->set_userdata('namedisplay',$row->Name);
                if($passord == $store_password)
                {
                    $this->session->set_userdata('id',$row->ID);
                    return "match password successfully";
                }
                else
                {
                    return "wrong password";
                }
            }
        }
        else
        {
            return "Wrong email entered";
        }
    }


    //---------------------------HOME_MODEL--------------------
    public function uploadData($dataimage)
    {
        $id = $this->session->userdata('id');
          $this->db->where('ID', $id);
          $this->db->update('codetable', $dataimage);
          $updated_status = $this->db->affected_rows();
              if($updated_status > 0)
              {
                  // die("aaaaaaaaaaaaazzzzsssa");
                  return "data updated";
              }
              else
              {
                  return "Not Updated";
              }
    }
}
?>
