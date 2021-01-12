<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->_mcrypt_exists = ( ! function_exists('mcrypt_encrypt')) ? FALSE : TRUE;
        $this->load->library('form_validation');
        // $this->load->library('encryption');
        // $this->load->library('encrypt');
        $this->load->model('register_model');
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
            $id = $this->register_model->insert($data);
            if($id > 0){
                echo" Data Inserted Successful";
            }
        }
        else {
            $this->index();
        }

    }
}

?>
