<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('siswa_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->siswa_model->list();
        $data["Total_Iuran"] = $this->dashboard_model->Total_Iuran();
        $data["Total_Warga"] = $this->dashboard_model->Total_Warga();
        $this->load->view("dashboard/dashboard", $data);
    }

}
