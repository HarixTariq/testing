<?php
defined('BASEPATH') OR exit('No direct acces to this page');

class Addfriend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        if(!$this->session->userdata('id'))
        {
            //echo '<script>alert("Cant access the page directly");</script>';
            redirect('login');
        }
    }
    function index()
    {
        $getdata = array();
        $getdata['result'] = $this->user_model->getallusers();
        $this->load->view('addfriend',$getdata);
    }
    public function adding_friend()
    {
        $data = $this->input->post();
        die($data->user_id.value());
        $this->user_model->addingFriend($id);

    }

}
?>
