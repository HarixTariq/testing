<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forfriend extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if(!$this->session->userdata('id'))
        {
            redirect('login');
        }
        $this->load->model('friend_model');
    }
    function index()
    {
        $this->load->view('friendprofile');
    }
    public function showprofile($user_id)
    {
        $data['comments'] = $this->friend_model->get_comments();
        $data['replies'] = $this->friend_model->get_comments();
        $data['posts'] = $this->friend_model->showingpost($user_id);
        $data['userData'] = $this->friend_model->get_data($user_id);
        $users= $this->friend_model->getallusers();
        $user_names = [];
        foreach ($users as $key => $user) {
            $user_names[$user->ID] = $user->Name;
        }
        $data['names'] = $user_names;
        $this->load->view('friendprofile',$data);
    }
    function commentData()
    {
        $comment = $this->input->post('commenttext');
        $post_id = $this->input->post('post_id');
        $data = $this->friend_model->savingCommentdata($comment,$post_id);
        echo json_encode($data);
    }
    function replyData()
    {
        $reply = $this->input->post('replytext');
        $comment_id = $this->input->post('comment_id');
        $post_id = $this->input->post('post_id');
        $data = $this->friend_model->savingReplydata($post_id,$comment_id,$reply);
        echo json_encode($data);
    }
    public function adding_friend()
    {
        $uid = $this->input->post('userId');
        $this->friend_model->addingFriend($uid);
    }
    function showsuggestion()
    {
        $getdata = array();
        $getdata['result'] = $this->friend_model->getnotfriends();
        $this->load->view('addfriend',$getdata);
    }
    function showmyfriend()
    {
        $getdata = array();
        $getdata['list'] = $this->friend_model->friend_list();
        $this->load->view('friendlist',$getdata);
    }
}
?>
