<?php
// class login_model extends CI_Model
// {
//     function can_login($email, $passord)
//     {
//         $query = $this->db->query("SELECT * FROM codetable where Email = '$email'");
//         if($query->num_rows() > 0)
//         {
//             foreach($query->result() as $row)
//             {
//                 $store_password = $row->password;
//                 $this->session->set_userdata('namedisplay',$row->Name);
//                 if($passord == $store_password)
//                 {
//                     $this->session->set_userdata('id',$row->ID);
//                     return "match password successfully";
//                 }
//                 else
//                 {
//                     return "wrong password";
//                 }
//             }
//         }
//         else
//         {
//             return "Wrong email entered";
//         }
//     }
// }
?>
