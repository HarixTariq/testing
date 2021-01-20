<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friendprofile extends CI_Controller
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
        // $data['comments'] = $this->friend_model->get_comments();
        $this->load->view('friendprofile');
    }
    public function showprofile($user_id)
    {
        $data['comments'] = $this->friend_model->get_comments();
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
        //die("aaaaaaaaaaaaaaa");
        $comment = $this->input->post('commenttext');
        $post_id = $this->input->post('post_id');
        $data = $this->friend_model->savingCommentdata($comment,$post_id);
        echo json_encode($data);
    }
}
?>
