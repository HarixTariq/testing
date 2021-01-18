<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id'))
        {
            redirect('Home');
        }
        $this->load->library('form_validation');
        $this->load->model('user_model');                                  //MODEL
        //$this->load->model('home_model');
    }

    function index(){
        $this->load->view('register');
    }
    function validation(){
        $this->form_validation->set_rules('user_name','Name','required|trim');
        $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email|is_unique[codetable.email]');
        $this->form_validation->set_rules('user_password','Password','required');
        if ($this->form_validation->run()) {
            $verification_key = md5(rand());
            $data = array(
                'name'      =>  $this->input->post('user_name'),
                'email'     =>  $this->input->post('user_email'),
                'password'  =>  $this->input->post('user_password'),
                'verification_key'  => $verification_key
            );
            $id = $this->user_model->insert($data);                        //MODEL
            if($id > 0){
                $this->session->set_userdata('id',$id);
                $this->session->set_userdata('namedisplay',$this->input->post('user_name'));
                redirect('Home');
            }
        }
        else {
            $this->index();
        }
    }
}
?>
