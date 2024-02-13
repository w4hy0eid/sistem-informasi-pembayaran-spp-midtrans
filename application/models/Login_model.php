<?php

class Login_model extends CI_Model
{
    private $_user = "user";
    private $_user_siswa = "siswa";
    private $_admin = "user";

    public function login()
    {
        $post = $this->input->post(); 
        $this->db->where('username', $post["username"]);
       // $user = $this->db->get($this->_user)->row();
        $user = $this->db->get_where($this->_user, array('username' => $post["username"]))->row();
        $this->db->where('username', $post["username"]);
        $user_siswa = $this->db->get($this->_user_siswa)->row();
        if ($user) {
            $isPasswordTrue = password_verify($post["password"], $user->password);
            $this->session->set_userdata(['login' => "user"]);
            $this->session->set_userdata(['SES-ROLE' => $user->jabatan]);  
        } elseif ($user_siswa) {
            $isPasswordTrue_siswa = password_verify($post["password"], $user_siswa->password);
            $this->session->set_userdata(['login' => "siswa"]);
            $this->session->set_userdata(['SES-ROLE' => 'Siswa']);
         
        } elseif($user_siswa->aktivasi == 0){
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-white">User belum diaktivasi !</div>');
          redirect(site_url("login"));
        }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-white">User tidak terdaftar !</div>');
            redirect(site_url("login"));
        }
        // jika password benar dan dia admin
        if ($isPasswordTrue or $isPasswordTrue_siswa) {
            $username = $post["username"];
           $this->session->set_userdata(['SES-SISFO' => $username]);
            redirect(site_url("dashboard"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-white">Password Salah !</div>');
            redirect(site_url("login"));
        }

    }

    public function isNotLogin()
    {
        return $this->session->userdata('SES-SISFO') == null;
    }
    
     public function save_register()
    {
        $post = $this->input->post();

        $this->id_siswa = null;
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->nama_siswa = $post["nama_siswa"];
        $this->nik_siswa = $post["nik_siswa"];
        $this->no_kk_siswa = $post["kk_siswa"];
        $this->status_siswa = $post["status_siswa"];
        $this->alamat = $post["alamat"];
        $this->no_kelas_siswa_siswa = $post["no_kelas_siswa"];
        $this->aktivasi = 0;
        $this->created_at = date("Y-m-d");

        if ($this->db->insert("siswa", $this)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Berhasil Mendaftar!</div>');
            redirect(site_url("login/register"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Gagal Mendaftar!</div>');
            redirect(site_url("login/register"));
        }
    }

}
