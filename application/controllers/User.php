<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// class User extends CI_Controller
// {
// //----------------------------------------LOGIN--------------------------
// public function __construct()
// {
//     parent::__construct();
//     if($this->session->userdata('id'))
//     {
//         redirect('Home');
//     }
//     else
//     {
//         redirect('login');
//     }
//     $this->load->library('form_validation');
//     //$this->load->model('login_model');                     //MODEL
//     //$this->load->model('user_model');
//     //$this->load->model('register_model');                                  //MODEL
//     //$this->load->model('home_model');
//     $this->load->model('user_model');
//     //$this->load->model('profile_model');                           //MODEL
//
// }
// function indexLogin()
// {
//     $this->load->view('login');
// }
// function validationL()
// {
//     $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email');
//     $this->form_validation->set_rules('user_password','Password','required');
//     if ($this->form_validation->run())
//     {
//         $result = $this->user_model->can_login($this->input->post('user_email'),$this->input->post('user_password')); //MODEL
//         if ($result == 'match password successfully')
//         {
//             redirect('Home');
//         }
//         else
//         {
//             $this->session->set_flashdata('message',$result);
//             redirect('login');
//         }
//
//     }
//     else
//     {
//         $this->indexLogin();
//     }
// }
// //------------------------------------------------HOME-------------------------------
//
// function indexHome()
// {
//     $this->load->view('home');
// }
// function logout()
// {
//     $data = $this->session->all_userdata();
//     foreach ($data as $row => $row_value)
//     {
//         $this->session->unset_userdata($row);
//     }
//     redirect ('login');                                                   //REDIRECT
// }
// function ajax_upload()
// {
//     if (isset($_FILES["image_file"]["name"]))
//     {
//         $config['upload_path'] = './upload/';
//         $config['allowed_types'] = '*';
//         $config['max_size'] = '3000';
//         $this->load->library('upload',$config);
//         // die("iamageeeeeeeeeeeee0");
//         $image = $_FILES['image_file']['name'];
//         $dataimage = array(     'image' => 'upload/'.$image, ); //$data["file_name"] == $image; //ERRO !
//         if(!$this->upload->do_upload('image_file'))
//         {
//             echo $this->upload->display_errors();
//         }
//         else
//         {
//             $data = $this->upload->data();
//             //echo base_url().'upload/'.$data["file_name"] ;
//             $dataimage = $this->user_model->uploadData($dataimage);         //MODEL
//             echo '<img src ="upload/'.$data["file_name"].'" />';
//             echo json_encode($dataimage);
//         }
//     }
// }
//
// //----------------------------PROFILE-----------------------------------------------
// function indexProfile()
// {
//     $getdata = array();
//     $getdata = $this->user_model->get_data();                   //MODEL
//     $this->load->view('profile',$getdata);
// }
// function updatedata()
// {
//     $this->form_validation->set_rules('user_name','Name','required|trim');
//     $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email|is_unique[codetable.email]');
//     $this->form_validation->set_rules('user_password','Password','required');
//     if ($this->form_validation->run())
//     {
//         // die("aaaaaaaaaaaaaaaaaa");
//         $verification_key = md5(rand());
//         $udata = array(
//             'Name'      =>  $this->input->post('user_name'),
//             'Email'     =>  $this->input->post('user_email'),
//             'password'  =>  $this->input->post('user_password'),
//             'Verification_key'  => $verification_key
//         );
//         $id = $this->user_model->update_data($udata);             //MODEL
//         if ($id == "data updated")
//         {
//             $this->indexProfile();
//         }
//         else
//         {
//             echo ("not inserted");
//             $this->indexProfile();
//         }
//     }
//     else
//     {
//         $this->indexProfile();
//     }
// }
//
// //------------------------------------REGISTRATION--------------------------
//
// function indexRegister()
// {
//     $this->load->view('register');
// }
// function validationR()
// {
//     $this->form_validation->set_rules('user_name','Name','required|trim');
//     $this->form_validation->set_rules('user_email','Email Address','required|trim|valid_email|is_unique[codetable.email]');
//     $this->form_validation->set_rules('user_password','Password','required');
//     if ($this->form_validation->run())
//     {
//         $verification_key = md5(rand());
//         $data = array(
//             'name'      =>  $this->input->post('user_name'),
//             'email'     =>  $this->input->post('user_email'),
//             'password'  =>  $this->input->post('user_password'),
//             'verification_key'  => $verification_key
//         );
//         $id = $this->user_model->insert($data);                        //MODEL
//         if($id > 0)
//         {
//             $this->session->set_userdata('id',$id);
//             $this->session->set_userdata('namedisplay',$this->input->post('user_name'));
//             redirect('Home');
//         }
//     }
//     else
//     {
//         $this->indexRegister();
//     }
// }
// }
?>
