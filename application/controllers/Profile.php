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
        $this->load->model('profile_model');

    }
    function index()
    {
        $getdata = array();
        $getdata = $this->profile_model->get_data();
        $this->load->view('profile',$getdata);
    }
    function updatedata()
    {
        $this->form_validation->set_rules('user_name','Name','required|trim');
        $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email|is_unique[codetable.email]');
        $this->form_validation->set_rules('user_password','Password','required');
        if ($this->form_validation->run()) {
            // die("aaaaaaaaaaaaaaaaaa");
            $verification_key = md5(rand());
            $udata = array(
                'Name'      =>  $this->input->post('user_name'),
                'Email'     =>  $this->input->post('user_email'),
                'password'  =>  $this->input->post('user_password'),
                'Verification_key'  => $verification_key
            );
            $id = $this->profile_model->update_data($udata);
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
}
?>
