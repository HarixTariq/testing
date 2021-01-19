<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if(!$this->session->userdata('id'))
        {
            redirect('login');
        }
        $this->load->library('form_validation');
        //$this->load->model('profile_model');                           //MODEL
        $this->load->model('user_model');
    }
    function index()
    {
        $getdata = array();
        $getdata = $this->user_model->get_data();                   //MODEL
        $this->load->view('profile',$getdata);
    }
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
            $id = $this->user_model->update_data($udata);             //MODEL
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
        //die("aabcbcccccccccccccccc");
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
                //$data = $this->upload->data();
                //echo base_url().'upload/'.$data["file_name"] ;
                $dataimage = $this->user_model->uploadData($dataimage);         //MODEL

                echo json_encode($dataimage);
            }
        }
    }
}
?>
