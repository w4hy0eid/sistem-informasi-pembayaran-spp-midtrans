<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('Siswa_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->Siswa_model->list();
        $this->load->view("dashboard/admin/data_siswa/list", $data);
    }

    public function add()
    {
        $this->load->view("dashboard/admin/data_siswa/add");
    }
    
    public function edit($id = null)
    {
         if(!$id){
            redirect(site_url());
        }
        $data["edit"] = $this->Siswa_model->data_edit($id);
        $this->load->view("dashboard/admin/data_siswa/edit",$data);
    }

    public function saya(){
        $data["edit"] = $this->Siswa_model->data_saya();
        $this->load->view("dashboard/siswa/data_saya/saya",$data);
    }
    
    function print($id = null) {
        if (!isset($id)) {
            redirect(site_url());
        }
        $this->load->library('pdf');
        $date = date("Y-m-d_H_i_s");
        // $data["data"] = $this->ikrar_model->print($id_wakaf);
        // $data["pengaturan"] = $this->pengaturan_model->show_set();
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml(ob_get_clean());
        $this->pdf->setPaper('A4', 'potrait');
        // $no_wakaf = str_replace("/", "_", $this->ikrar_model->print($id_wakaf)->no_wakaf);
        // $nama_wakif = $this->ikrar_model->print($id_wakaf)->nama_wakif;
        $this->pdf->filename = "SURAT-KETERANGAN-DOMISILI.pdf";
        $this->pdf->load_view('dashboard/siswa/surat/domisili');
    }

    
    public function save()
    {
        $this->Siswa_model->save();
    }
    
    public function save_edit()
    {
        $this->Siswa_model->edit();
    }
    
    public function save_saya()
    {
        $this->Siswa_model->save_saya();
    }
    
    public function hapus()
    {
        $this->Siswa_model->hapus();
    }
    public function cek_user(){
        $username = $this->input->post('username'); 
        $sql = $this->db->query("SELECT username FROM siswa WHERE username='$username'");
        $cek_user = $sql->num_rows();
        echo $cek_user;
    }  
    public function cek_email(){
        $email = $this->input->post('email'); 
        $sql = $this->db->query("SELECT email FROM user WHERE email='$email'");
        $cek_email = $sql->num_rows();
        echo $cek_email;
    }  
}
