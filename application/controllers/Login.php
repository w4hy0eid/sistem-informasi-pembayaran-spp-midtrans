<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view("login/login");
    }
    
    public function register()
    {
        $this->load->view("login/register");
    }

    public function doLogin()
    {
        $this->login_model->login();
    }
    
    public function save_register()
    {
        $this->login_model->save_register();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
