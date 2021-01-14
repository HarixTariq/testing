<?php
defined('BASEPATH') OR exit('No direct acces to home page');

 class Home extends CI_Controller
 {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        if(!$this->session->userdata('id'))
        {
            redirect('login');
        }
    }
    function index()
    {
        $this->load->view('home');
        // $nam = $this->session->userdata('namedisplay');
        // echo '<h3 algin="center"> Welcome '.$nam.' </h3>';
        // echo '<h2 align="right" style = "padding-top:700px; padding-right:200px;"><a href="'.base_url().'index.php/home/logout">Logout</a></h2>';
        // echo '<h2 align="right" style = "padding-right:200px;"><a href="'.base_url().'index.php/profile">Show Profile</a></h2>';

    }
    function logout()
    {
        $data = $this->session->all_userdata();
        foreach ($data as $row => $row_value)
        {
            $this->session->unset_userdata($row);
        }
        redirect ('login');
    }
    function upload_file()
    {
        die('llllllllllllllllllll');
        $config['upload_path']   = './files/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('userfile'))
        {
            echo ("Cant upload the picture");
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $data = $this->upload->data();
            $file_id = $this->files_model->insert_file($data['file_name']);
            if($file_id == "data updated")
            {
                $status = "success";
                $msg = "File successfully uploaded";
                echo($msg);
            }
            else
            {
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
                echo($msg);
            }
        }
    }
 }




 ?>
