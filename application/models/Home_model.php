<?php
class Home_model extends CI_Model
{
    public function insert_file($filename)
    {
        $data = array(  'image'      => $filename);
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
}

 ?>
