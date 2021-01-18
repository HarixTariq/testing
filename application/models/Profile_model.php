<?php
// class Profile_model extends CI_Model
// {
//     function get_data()
//     {
//             $id = $this->session->userdata('id');
//             $this->db->where('id', $id);
//             $query = $this->db->get('codetable');  // Produces: SELECT * FROM mytable
//
//             //$query = $this->db->query("SELECT * FROM codetable where ID = '$id'");
//             if($query->num_rows() > 0)
//             {
//                 foreach ($query->result() as $row)
//                 {
//                     $data = array();
//                         $data['name']      =  $row->Name;
//                         $data['email']     =  $row->Email;
//                         $data['password']  =  $row->password;
//                         $data['image']     =  $row->image;
//                 }
//             }
//             else {
//                 echo ("No Record Found");
//             }
//     return $data;
//     }
//     function update_data($data1)
//     {
//         $id = $this->session->userdata('id');
//         $this->db->where('id', $id);
//         $this->db->update('codetable', $data1);
//         $updated_status = $this->db->affected_rows();
//         if($updated_status)
//         {
//             // die("aaaaaaaaaaaaazzzzsssa");
//             return "data updated";
//         }
//         else
//         {
//             return "Not Updated";
//         }
//
//     }
// }

 ?>
