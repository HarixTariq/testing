<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct(){

        parent::__construct();
        if($this->session->userdata('id'))
        {
            redirect('Home');
        }
        $this->load->library('form_validation');
        //$this->load->model('login_model');                     //MODEL
        $this->load->model('user_model');
    }
    function index()
    {
        $this->load->view('login');
    }
    function validation()
    {
        $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email');
        $this->form_validation->set_rules('user_password','Password','required');
        if ($this->form_validation->run())
        {
            $result = $this->user_model->can_login($this->input->post('user_email'),$this->input->post('user_password')); //MODEL
            if ($result == 'match password successfully') {
                redirect('Home');
            } else {
                $this->session->set_flashdata('message',$result);
                redirect('login');
            }

        }
        else
        {
            $this->index();
        }
    }
}

 ?>
