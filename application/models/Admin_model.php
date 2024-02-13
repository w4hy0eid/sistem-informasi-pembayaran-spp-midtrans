<?php

class Admin_model extends CI_Model
{

 public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');

    } 
    
    public function list()
    {
        $this->db->select("*");
        $this->db->from("user");
        return $this->db->get()->result();
    }

 
    function data_saya() {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("username",$this->session->userdata('SES-SISFO'));
        return $this->db->get()->row();
    }
   
   
    public function data_admin($id)
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    
    
    public function data_pengaturan(){
        $this->db->select("*");
        $this->db->from("pengaturan");
        $this->db->where('id_pengaturan', '1');
        return $this->db->get()->row();
    }
    
     public function save()
    {
        $post = $this->input->post();

        $this->id = null;
        $this->name = $post["nama_admin"];
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email = $post["email"];
        $this->jabatan = $post["jabatan"];
        $this->created_at = date("Y-m-d");

        if ($this->db->insert("user", $this)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Data Admin Berhasil disimpan!</div>');
            redirect(site_url("admin"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Data Admin Gagal disimpan!</div>');
            redirect(site_url("admin"));
        }
    }
    
     public function save_saya(){
        
        $post = $this->input->post();
        if($post["password"] != null){
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        }
        $this->name = $post["nama_admin"];
        $this->email = $post["email"];
        if ($this->db->update("user", $this, array('username' => $this->session->userdata('SES-SISFO')))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("admin/saya"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("admin/saya"));
        }
    }

    public function edit(){
        
        $post = $this->input->post();
        if($post["password"] != null){
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        }
        $this->name = $post["nama_admin"];
        $this->email = $post["email"];
        $this->jabatan = $post["jabatan"];
        if ($this->db->update("user", $this, array('id' => $post["id"]))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("admin/edit/".$post["id"]));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("admin/edit/".$post["id"]));
        }
    }
    
    
    
    public function save_pengaturan(){
        
        $post = $this->input->post();
        $this->alamat = $post["alamat"];
        $this->nama_rt = $post["nama_rt"];
        if ($this->db->update("pengaturan", $this, array('id_pengaturan' => '1'))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengaturan Berhasil Diubah !</div>');
            redirect(base_url("admin/pengaturan"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pengaturan Gagal Diubah !</div>');
            redirect(base_url("admin/pengaturan"));
        }
    }
    
     public function hapus()
    {
        $post = $this->input->post();
        $id = $post["id"];
        if ($this->db->delete("user", array("id" => $id))) {
            $output = array(
                "error_code" => 0,
                "message" => "success",
            );
        } else {
            $output = array(
                "error_code" => 2,
                "message" => "failed",
            );
        }
        echo json_encode($output);
    }
}
