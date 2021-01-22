<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Userregistration extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id'))
        {
            redirect('Homeprofile/home');
        }
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    function index(){
        $this->load->view('login');
    }
    function indexRegistration(){
        $this->load->view('register');
    }

    function validationRegistration()
    {
        $this->form_validation->set_rules('user_name','Name','required|trim');
        $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('user_password','Password','required');
        if ($this->form_validation->run()) {
            $verification_key = md5(rand());
            $data = array(
                'name'      =>  $this->input->post('user_name'),
                'email'     =>  $this->input->post('user_email'),
                'password'  =>  $this->input->post('user_password'),
                'verification_key'  => $verification_key
            );
            $id = $this->user_model->insert($data);
            if($id > 0){
                $this->session->set_userdata('id',$id);
                $this->session->set_userdata('namedisplay',$this->input->post('user_name'));
                redirect('Homeprofile/home');
            }
        }
        else {
            $this->load->view('register');
        }
    }
    function validationLogin()
    {
        $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email');
        $this->form_validation->set_rules('user_password','Password','required');
        if ($this->form_validation->run())
        {
            $result = $this->user_model->can_login($this->input->post('user_email'),$this->input->post('user_password'));
            if ($result == 'match password successfully') {
                redirect('Homeprofile/home');
            } else {
                $this->session->set_flashdata('message',$result);
                redirect('Homeprofile/home');
            }
        }
        else
        {
            $this->load->view('login');
        }
    }
}

?>
