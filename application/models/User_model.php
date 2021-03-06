<?php
class User_model extends CI_Model{
    //-----------------------------REGISTER_MODEL-------------------------
    function insert($data){
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }
    //-----------------------------PROFILE_MODEL--------------------------
    function get_data()
    {
            $id = $this->session->userdata('id');
            //$this->db->select('friendid');
            $this->db->where('id', $id);
            $query = $this->db->get('user');  // Produces: SELECT * FROM mytable

            //$query = $this->db->query("SELECT * FROM user where ID = '$id'");
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
        $this->db->update('user', $data1);
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
        $query = $this->db->query("SELECT * FROM user where Email = '$email'");
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
          $this->db->update('user', $dataimage);
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
    //----------------------------Add Friend-------------------
    public function getallusers()
    {
        // $id = $this->session->userdata('id');
        // $this->db->select('*');
        // $this->db->from('user');
        // $this->db->join('friends', 'user.ID <> friends.friendid');
        // $query = $this-> db->get();
        // return $query->result();
        $query = $this-> db->get('user');
        return $query->result();
    }
    public function addingFriend($friendid)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'userid' => $id,
            'friendid'=> $friendid
        );
        $this->db->insert('friends',$data);
        // $this->db->where('userid', $id);
        // $this->db->update('friends', $friendid);
        $updated_status = $this->db->insert_id();
            if($updated_status > 0)
            {
                // die("aaaaaaaaaaaaazzzzsssa");
                return "You are now a freind";
            }
            else
            {
                return "You are not a freind";
            }
    }
    public function savingPostdata($postdata)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'userid' => $id,
            'text'=> $postdata
        );
        $this->db->insert('user_post',$data);
    }
    public function showingpost()
    {
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('user_post');
        $this->db->where('userid',$id);
        $this->db->order_by("date","desc");
        $query = $this->db->get();
        return $query->result();
    }
    //savingCommentdata
    public function savingCommentdata($commentdata,$post_id)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'userid' => $id,
            'postid' => $post_id,
            'text'=> $commentdata,
            'parent_id' => 'id'
        );
        $this->db->insert('post_comment',$data);
    }
    public function get_comments()
    {
        $query = $this-> db->get('post_comment');
        return $query->result();
    }
    public function getnotfriends()
    {
        // $id = $this->session->userdata('id');
        // $this->db->select('u.*');
        // $this->db->from('user u');
        // $this->db->join('friends f', "f.friendid=u.ID");
        // $this->db->where('f.userid =',$id);
        // $this->db->where('f.friendid !=',$id);
        //$this->db->where('u.ID ',$id);
        $query = $this-> db->get('user');
        return $query->result();
    }
    public function savingReplydata($post_id,$comment_id,$reply)
    {
        $id = $this->session->userdata('id');
        $data = array(
            'userid' => $id,
            'postid' => $post_id,
            'text'=> $reply,
            'parent_id' => $comment_id
        );
        $this->db->insert('post_comment',$data);
    }
}
?>
