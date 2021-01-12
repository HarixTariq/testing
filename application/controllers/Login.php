<?php
defined('BASEPATH') OR exit('No direct access to login page is allowed');
class Login extends CI_Controller{
    public function __construct(){

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('login_model');
    }
    function index()
    {
        $this->load->view('login');
    }
    function validation(){
        $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email');
        $this->form_validation->set_rules('user_password','Password','required');
        if ($this->form_validation->run()) {
            // code...
        }
        else{
            $this->index();
        }
    }
}

 ?>
