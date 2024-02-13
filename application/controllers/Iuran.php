<?php

class Iuran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('iuran_model');
        $this->load->model('Siswa_model');
        $this->load->model('payment_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->iuran_model->list_admin();
        $this->load->view("dashboard/admin/data_iuran/list", $data);
    }

    public function add_one()
    {
        $data["list"] = $this->Siswa_model->list();
        $this->load->view("dashboard/admin/data_iuran/add_one",$data);
    }
    
    public function add_mass()
    {
        $data["list"] = $this->Siswa_model->list();
        $this->load->view("dashboard/admin/data_iuran/add_mass",$data);
    }
    
    public function edit($id = null){
        if(!$id){
            redirect(site_url());
        }
        
        $data["edit"] = $this->iuran_model->data_iuran($id);
        $this->load->view("dashboard/admin/data_iuran/edit",$data);
    }
    
    public function save_one(){
        $this->iuran_model->save_one();
    }
    
    public function save_mass(){
        $this->iuran_model->save_mass();
    }
    
    public function save_edit(){
        $this->iuran_model->edit();
    }
    
    
    public function hapus(){
        $this->iuran_model->hapus();
    }

    public function print_laporan()
    {
        $this->load->library('pdf');
        $nama = $this->input->post('nama_siswa');
        $tahun = $this->input->post("tahun");
        
        
        $data["laporan2"] = $this->iuran_model->laporan();
            
         $this->pdf->set_option('isHtml5ParserEnabled', true);
         $this->pdf->set_option('isRemoteEnabled', true);
         $this->pdf->loadHtml(ob_get_clean());
         $this->pdf->setPaper('A4', 'landscape');
         $this->pdf->filename = "Print-Laporan-$tahun.pdf";
         
        

        
        $this->pdf->load_view("dashboard/admin/data_iuran/print_laporan_pdf", $data);
    }
}
