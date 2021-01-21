<?php
defined('BASEPATH') OR exit('No direct acces to home page');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('home_model');                                   //MODEL
        $this->load->model('user_model');
        if(!$this->session->userdata('id'))
        {
            echo '<script>alert("Cant access the page directly");</script>';
            redirect('login');
        }
    }
    function index()
    {
        //$getdata = array();
        $data['getdata'] = $this->user_model->get_data();
        $data['abc'] = $this->user_model->showingpost();
        $data['replies'] = $this->user_model->get_comments();
        $data['comments'] = $this->user_model->get_comments();
        $users= $this->user_model->getallusers();
        $user_names = [];
        foreach ($users as $key => $user) {
            $user_names[$user->ID] = $user->Name;
        }
        $data['names'] = $user_names;
        $this->load->view('home',$data);
    }
    // public function showprofile($user_id)
    // {
    //     //$data['comments'] = $this->user_model->get_comments();
    //     //$data['abc'] = $this->user_model->showingpost($user_id);
    //     //$data['getdata'] = $this->user_model->getuserdata($user_id);
    //
    //     $this->load->view('home',$data);
    // }
    function logout()
    {
        $data = $this->session->all_userdata();
        foreach ($data as $row => $row_value)
        {
            $this->session->unset_userdata($row);
        }
        redirect ('login');                                                   //REDIRECT
    }
    function ajax_upload()
    {
        if (isset($_FILES["image_file"]["name"]))
        {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '3000';
            $this->load->library('upload',$config);
            // die("iamageeeeeeeeeeeee0");
            $image = $_FILES['image_file']['name'];
            $dataimage = array(     'image' => 'upload/'.$image, ); //$data["file_name"] == $image; //ERRO !
            if(!$this->upload->do_upload('image_file'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                //echo base_url().'upload/'.$data["file_name"] ;
                $dataimage = $this->user_model->uploadData($dataimage);         //MODEL
                echo '<img src ="upload/'.$data["file_name"].'" />';
                echo json_encode($dataimage);
            }
        }
    }
    function postData()
    {
        $postdata = $this->input->post('posttext');
        $data = $this->user_model->savingPostdata($postdata);
        echo json_encode($data);
    }
    function commentData()
    {
        //die("aaaaaaaaaaaaaaa");
        $comment = $this->input->post('commenttext');
        $post_id = $this->input->post('post_id');
        $data = $this->user_model->savingCommentdata($comment,$post_id);
        echo json_encode($data);
    }
    function replyData()
    {
        $reply = $this->input->post('replytext');
        $comment_id = $this->input->post('comment_id');
        $post_id = $this->input->post('post_id');
        $data = $this->user_model->savingReplydata($post_id,$comment_id,$reply);
        echo json_encode($data);
    }
}
?>
