<?php

class Siswa_model extends CI_Model
{

    function list() {
        $this->db->select("*");
        $this->db->from("siswa");
        return $this->db->get()->result();
    }
    
    function data_edit($id_siswa) {
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->where("id_siswa",$id_siswa);
        return $this->db->get()->row();
    }
    
    function data_saya() {
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->where("username",$this->session->userdata('SES-SISFO'));
        return $this->db->get()->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->id_siswa = null;
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->nama_siswa = $post["nama_siswa"];
        $this->nis_siswa = $post["nis_siswa"];
        $this->kelas_siswa = $post["kelas_siswa"];
        $this->nama_ortu = $post["nama_ortu"];
        $this->alamat = $post["alamat"];
        $this->no_kelas_siswa = $post["no_kelas_siswa"];
        $this->aktivasi = '1';
        $this->created_at = date("Y-m-d");

        if ($this->db->insert("siswa", $this)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Data siswa Berhasil disimpan!</div>');
            redirect(site_url("siswa"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Data siswa Gagal disimpan!</div>');
            redirect(site_url("siswa"));
        }
    }
    
    public function edit(){
        
        $post = $this->input->post();
        // $this->username = $post["username"];
        if($post["password"] != null){
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        }
        $this->nama_siswa = $post["nama_siswa"];
        $this->nis_siswa = $post["nis_siswa"];
        $this->kelas_siswa = $post["kelas_siswa"];
        $this->nama_ortu = $post["nama_ortu"];
        $this->alamat = $post["alamat"];
        $this->no_kelas_siswa = $post["no_kelas_siswa"];
        $this->aktivasi = $post["aktivasi"];
        if ($this->db->update("siswa", $this, array('id_siswa' => $post["id_siswa"]))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("siswa/edit/") . $post['id_siswa']);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("siswa/edit/") . $post['id_siswa']);
        }
    }
    
    public function save_saya(){
        
        $post = $this->input->post();
        // $this->username = $post["username"];
        if($post["password"] != null){
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        }
        $this->nama_siswa = $post["nama_siswa"];
        $this->nis_siswa = $post["nis_siswa"];
        $this->kelas_siswa = $post["kelas_siswa"];
        $this->nama_ortu = $post["nama_ortu"];
        $this->alamat = $post["alamat"];
        $this->no_kelas_siswa = $post["no_kelas_siswa"];
        if ($this->db->update("siswa", $this, array('username' => $this->session->userdata('SES-SISFO')))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("siswa/saya"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("siswa/saya"));
        }
    }

     public function hapus()
        {
            $post = $this->input->post();
            $id = $post["id"];
            if ($this->db->delete("siswa", array("id_siswa" => $id))) {
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
