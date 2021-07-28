<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        // model bisa saja case sensitive, 
        // jadi perhatikan huruf besar kecilnya
    }

    public function index()
    {
        if(logged_in()){
            redirect('home');
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page';
            $this->load->view('auth/templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/footer');
        } else {
            $this->_login(); //fungsi login
        }
        
    }

    public function proseslogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->Admin_model->login($username, $password);
        
        if ($user) {
                if ($user['id_role'] == '1')
                {
                    $data = [
                    'username' => $username, 
                    'id_role' => $user['id_role']
                    ];
                }
                else 
                {
                    $data = [
                    'username' => $username,
                    'id_role' => $user['id_role']
                    ];
                }
                $this->session->set_userdata($user);

                if($user["id_museum"] !== null){
                    redirect('koleksi/index/'.$user["id_museum"]);
                } else {
                    redirect('prov/index');
                }
                

            } else {
                $this->session->set_flashdata('message1', '<small class="text-danger">Email belum diaktivasi</small>');
                redirect('auth');
            }
        
        
    }

//    public function register()
//    {
//        if(logged_in()){
//            redirect('prov/index');
//        }
//        //set rules name dengan alias name dan rulesnya required dan trim yaitu menghilangkan blank space pada karakter pertama dan terakhir
//        $this->form_validation->set_rules('name','Name','required|trim');
//        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
//        $this->form_validation->set_rules('password1','Password','required|trim|min_length[4]|matches[password2]',[
//        'matches' => 'Password does not match!',
//        'min_lenght' => 'Password too short'
//        ]);
//
//        $this->form_validation->set_rules('password2', 'Password Verifikasi','required|trim|min_length[4]|matches[password1]');
//
//        if($this->form_validation->run() == false)
//        {
//            $data['judul'] = 'Register Page';
//            $this->load->view('auth/templates/header', $data);
//            $this->load->view('auth/register');
//            $this->load->view('auth/templates/footer');        
//        }
//        else
//        {
//            $this->User_model->register();
//            redirect('auth');
//        }
//    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('auth');
    }
}