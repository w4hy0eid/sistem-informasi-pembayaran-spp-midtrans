<?php


class Surat_model extends CI_Model {
    
    public  function default_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);
        return "$tgl $bulan $thn";
    }
    
    function list($id) {
        $this->db->select("*");
        $this->db->from("surat_domisili");
        $this->db->where("id_warga",$id);
        return $this->db->get()->result();
    }
    
    
     function data_print($id) {
        $this->db->select("*");
        $this->db->from("surat_domisili");
        $this->db->where("id_domisili",$id);
        return $this->db->get()->row();
    }
    
      public function save()
    {
        $post = $this->input->post();

        $this->id_domisili = null;
        $this->id_warga = $post["id_warga"];
        $this->nama_lengkap_domisili = $post["nama_lengkap"];
        $this->jenis_kelamin_domisili = $post["jenis_kelamin"];
        $this->ttl_domisili = $post["ttl"];
        $this->no_kk_ktp_domisili = $post["nik_kk"];
        $this->pekerjaan_domisili = $post["pekerjaan"];
        $this->agama_domisili = $post["agama"];
        $this->kewarganegaraan_domisili = $post["kw"];
        $this->alamat_domisili = $post["alamat"];
        $this->date = date("Y-m-d");

        if ($this->db->insert("surat_domisili", $this)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Surat Domisili Berhasil disimpan!</div>');
            redirect(site_url("surat"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black"Surat Domisili Gagal disimpan!</div>');
            redirect(site_url("surat"));
        }
    }
    
     public function edit(){
        
        $post = $this->input->post();
        $this->nama_lengkap_domisili = $post["nama_lengkap"];
        $this->jenis_kelamin_domisili = $post["jenis_kelamin"];
        $this->ttl_domisili = $post["ttl"];
        $this->no_kk_ktp_domisili = $post["nik_kk"];
        $this->pekerjaan_domisili = $post["pekerjaan"];
        $this->agama_domisili = $post["agama"];
        $this->kewarganegaraan_domisili = $post["kw"];
        $this->alamat_domisili = $post["alamat"];
        
        if ($this->db->update("surat_domisili", $this, array('id_domisili' => $post["id_domisili"]))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("surat/edit/") . $post['id_domisili']);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("surat/edit/") . $post['id_domisili']);
        }
    }
    
    
     public function hapus()
        {
            $post = $this->input->post();
            $id = $post["id"];
            if ($this->db->delete("surat_domisili", array("id_domisili" => $id))) {
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