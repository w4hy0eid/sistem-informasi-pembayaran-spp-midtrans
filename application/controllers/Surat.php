<?php

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('surat_model');
        $this->load->model('dashboard_model');
        $this->load->model('admin_model');
        $this->load->helper('tgl_indo');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->surat_model->list($this->dashboard_model->Get_ID()->id_warga);
        $this->load->view("dashboard/siswa/surat/list", $data);
    }

    public function add()
    {
        $data["user"] = $this->dashboard_model->Get_ID();
        $this->load->view("dashboard/siswa/surat/add",$data);
    }
    
    public function edit($id = null)
    {
         if(!$id){
            redirect(site_url());
        }
        $data["edit"] = $this->surat_model->data_print($id);
        $this->load->view("dashboard/siswa/surat/edit",$data);
    }

    
    function print($id = null) {
        if (!isset($id)) {
            redirect(site_url());
        }
        $this->load->library('pdf');
        $date = date("Y-m-d_H_i_s");
        $data["data"] = $this->surat_model->data_print($id);
        $data["rt"] = $this->admin_model->data_pengaturan();
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml(ob_get_clean());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan.pdf";
        $this->pdf->load_view('dashboard/siswa/surat/domisili',$data);
    }

    
    public function save()
    {
        $this->surat_model->save();
    }
    
    public function save_edit()
    {
        $this->surat_model->edit();
    }
    
    public function hapus()
    {
        $this->surat_model->hapus();
    }
}
