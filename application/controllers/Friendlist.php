<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Friendlist extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        if(!$this->session->userdata('id'))
        {
            redirect('login');
        }
        //$this->load->library('form_validation');
        //$this->load->model('profile_model');                           //MODEL
        $this->load->model('user_model');
        $this->load->model('friend_model');
    }

    function index()
    {
        $getdata = array();
        $getdata['list'] = $this->friend_model->friend_list();                   //MODEL
        $this->load->view('friendlist',$getdata);
    }
}
?>
