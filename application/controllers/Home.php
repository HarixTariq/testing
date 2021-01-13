<?php
defined('BASEPATH') OR exit('No direct acces to home page');

 class Home extends CI_Controller
 {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id'))
        {
            redirect('login');
        }
    }
    function index()
    {
        //$this->load->view('home');
        $nam = $this->session->userdata('namedisplay');
        echo '<h3 algin="center"> Welcome '.$nam.' </h3>';
        echo '<h2 align="right" style = "padding-top:700px; padding-right:200px;"><a href="'.base_url().'index.php/home/logout">Logout</a></h2>';
        echo '<h2 align="right" style = "padding-right:200px;"><a href="'.base_url().'index.php/profile">Show Profile</a></h2>';
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
 }




 ?>
