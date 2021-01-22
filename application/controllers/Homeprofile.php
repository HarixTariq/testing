<?php
defined('BASEPATH') OR exit('No direct acces to home page');

class Homeprofile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        if(!$this->session->userdata('id'))
        {
            echo '<script>alert("Cant access the page directly");</script>';
            redirect('Userregistration');
        }

    }
    function index()
    {
        $this->load->view('home');
    }
    function home()
    {
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
    function profile()
    {
        $getdata = array();
        $getdata = $this->user_model->get_data();
        $this->load->view('profile',$getdata);
    }
    function logout()
    {
        $data = $this->session->all_userdata();
        foreach ($data as $row => $row_value)
        {
            $this->session->unset_userdata($row);
        }
        redirect ('Userregistration');
    }
    // function ajax_upload()
    // {
    //     if (isset($_FILES["image_file"]["name"]))
    //     {
    //         $config['upload_path'] = './upload/';
    //         $config['allowed_types'] = '*';
    //         $config['max_size'] = '3000';
    //         $this->load->library('upload',$config);
    //         // die("iamageeeeeeeeeeeee0");
    //         $image = $_FILES['image_file']['name'];
    //         $dataimage = array(     'image' => 'upload/'.$image, ); //$data["file_name"] == $image; //ERRO !
    //         if(!$this->upload->do_upload('image_file'))
    //         {
    //             echo $this->upload->display_errors();
    //         }
    //         else
    //         {
    //             $data = $this->upload->data();
    //             //echo base_url().'upload/'.$data["file_name"] ;
    //             $dataimage = $this->user_model->uploadData($dataimage);
    //             echo '<img src ="upload/'.$data["file_name"].'" />';
    //             echo json_encode($dataimage);
    //         }
    //     }
    // }
    function updatedata()
    {
        $this->form_validation->set_rules('user_name','Name','required|trim|is_unique[user.name]');
        $this->form_validation->set_rules('user_email','Email Address','required');
        $this->form_validation->set_rules('user_password','Password','required');
        if ($this->form_validation->run())
        {
            //die("aaaaaaaaaaaaaaaaaa");
            $verification_key = md5(rand());
            $udata = array(
                'Name'      =>  $this->input->post('user_name'),
                'Email'     =>  $this->input->post('user_email'),
                'password'  =>  $this->input->post('user_password'),
                'Verification_key'  => $verification_key,
                'image'     =>  $this->input->post('')
            );
            $id = $this->user_model->update_data($udata);
            if ($id == "data updated")
            {
                $this->index();
            }
            else
            {
                echo ("not inserted");
                $this->index();
            }
        }
        else {
            $this->index();
        }
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
            $dataimage = array(     'image' => 'upload/'.$image, );
            if(!$this->upload->do_upload('image_file'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
                $dataimage = $this->user_model->uploadData($dataimage);
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
