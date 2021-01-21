<?php
class Friend_model extends CI_Model{
    public function friend_list()
    {
            $id = $this->session->userdata('id');
            // $this->db->select('user.Name');
            // $this->db->from('user','friends');
            // $this->db->join('friends','user.ID = friends.friendid','left');
            //$this->db->where();
            $this->db->select('u.*'); // <-- There is never any reason to write this line!
            $this->db->from('user u');
            //$this->db->join('friends','friends.userid = $id');
            $this->db->join('friends f', "f.friendid=u.ID");
            $this->db->where('f.userid',$id);
            $this->db->or_where('f.friendid',$id);
            $this->db->where('u.ID !=',$id);
            //$this->db->or_where('select f.userid where f.friendid= u.ID');
            $query = $this-> db->get();
            return $query->result();
    }
    function get_data($id)
    {
            //$id = $this->session->userdata('id');
            //$this->db->select('friendid');
            $this->db->where('id', $id);
            $query = $this->db->get('user');  // Produces: SELECT * FROM mytable

            //$query = $this->db->query("SELECT * FROM user where ID = '$id'");
            if($query->num_rows() > 0)
            {
                foreach ($query->result() as $row)
                {
                    $data1 = array();
                        $data1['name']      =  $row->Name;
                        $data1['email']     =  $row->Email;
                        $data1['password']  =  $row->password;
                        $data1['image']     =  $row->image;
                }
            }
            else {
                echo ("No Record Found");
            }
    return $data1;
    }
    public function showingpost($id)
    {
        //$id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('user_post');
        $this->db->where('userid',$id);
        $this->db->order_by("date","desc");
        $query = $this->db->get();
        return $query->result();
    }
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
    public function getallusers()
    {
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
    // public function get_reply()
    // {
    //     $this-> db->get('post_comment');
    //     $this-> db->where('');
    //     return $query->result();
    // }

}
 ?>
