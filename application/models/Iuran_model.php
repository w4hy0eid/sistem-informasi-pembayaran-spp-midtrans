<?php

class Iuran_model extends CI_Model
{

 public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');

    }
    
    public function list_admin()
    {
        $this->db->select("*");
        $this->db->from("iuran");
        $this->db->join('siswa', 'siswa.id_siswa = iuran.id_siswa');
        $this->db->join('history_transaksi', 'history_transaksi.order_id = iuran.order_id');
        return $this->db->get()->result();
    }

    function laporan() {
        $tahun = $this->input->post('tahun');
        $tahu = explode('-', $tahun);
        $this->db->select("*");
        $this->db->from("history_transaksi");
        $this->db->join('iuran', 'iuran.order_id = history_transaksi.order_id');
        $this->db->join('siswa', 'siswa.id_siswa = iuran.id_siswa');
       $this->db->where("year(transaction_time) = '$tahu[0]' and month(transaction_time) = '$tahu[1]'");

        return $this->db->get()->result();
    }

    function laporan2() {
        $nama = $this->input->post('nama_siswa');
        $tahun = $this->input->post('tahun');
        $tahu = explode('-', $tahun);
        $this->db->select("*");
        $this->db->from("history_transaksi");
        $this->db->join('iuran', 'iuran.order_id = history_transaksi.order_id');
        $this->db->join('siswa', 'siswa.id_siswa = iuran.id_siswa');
        $this->db->where("id_siswa = '$nama' and year(transaction_time) = '$tahu[0]' and month(transaction_time) = '$tahu[1]'");
        return $this->db->get()->result();
    }


    function data_print($id) {
        $this->db->select("*");
        $this->db->from("history_transaksi");
        $this->db->join('iuran', 'iuran.order_id = history_transaksi.order_id');
        $this->db->join('siswa', 'siswa.id_siswa = iuran.id_siswa');
        $this->db->where("order_id",$id);
        return $this->db->get()->row();
    }

    public function data_iuran($id_iuran)
    {
        $this->db->select("*");
        $this->db->from("iuran");
        $this->db->join('siswa', 'siswa.id_siswa = iuran.id_siswa');
        $this->db->join('history_transaksi', 'history_transaksi.order_id = iuran.order_id');
        $this->db->where('iuran.id_iuran', $id_iuran);
        return $this->db->get()->row();
    }

    public function get_ID_Iuran($order_id){
        $this->db->select("*");
        $this->db->from("iuran");
        $this->db->where("order_id",$order_id);
        return $this->db->get()->row();
        
    }
    
    public function get_ID_siswa($id_siswa){
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->where("id_siswa",$id_siswa);
        return $this->db->get()->row();
        
    }
    
    public function save_one(){
        $post = $this->input->post();
        
        $this->id_iuran = null;
        $this->id_siswa = $post["id_siswa"];
        $this->order_id = rand();
        $this->total_iuran = $post["total_iuran"];
        $this->keterangan_iuran = $post["keterangan_iuran"];
        $this->waktu = $post["tanggal_iuran"];
        $this->session->set_userdata(['save_order_id' => $this->order_id]);
        
        if($this->db->insert("iuran",$this)){
            $data = array(
        
            'order_id' => $this->session->userdata('save_order_id'),
            'id_iuran' => $this->get_ID_Iuran($this->session->userdata('save_order_id'))->id_iuran,
            'payment_type' => '',
            'transaction_time' => '',
            'bank' => '',
            'va_number' => '',
            'status_code' => '201'
            
            );
            // print_r($this->get_ID_Iuran($this->session->userdata('save_order_id')));
            $this->db->insert("history_transaksi",$data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success text-black">Data Iuran siswa Berhasil disimpan!</div>');
            redirect(site_url("iuran"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-black">Data Iuran siswa Gagal disimpan!</div>');
            redirect(site_url("iuran"));
        }
    }
    
    
    
    public function save_mass(){
        $post = $this->input->post();
        $this->id_iuran = null;
        $this->id_siswa = $post["id_siswa"];
        $this->order_id = rand();
        $this->total_iuran = $post["total_iuran"];
        $this->keterangan_iuran = $post["keterangan_iuran"];
        $this->waktu = $post["tanggal_iuran"];
        $this->session->set_userdata(['save_order_id' => $this->order_id]);
        
        if($this->db->insert("iuran",$this)){
            $data = array(
        
            'order_id' => $this->session->userdata('save_order_id'),
            'id_iuran' => $this->get_ID_Iuran($this->session->userdata('save_order_id'))->id_iuran,
            'payment_type' => '',
            'transaction_time' => '',
            'bank' => '',
            'va_number' => '',
            'status_code' => '201'
            
            );
        
            $this->db->insert("history_transaksi",$data);
            $output = array(
                    "error_code" => 200,
                    "message" => "Iuran Berhasil dikirim ke ". $this->get_ID_siswa($post["id_siswa"])->nama_siswa,
                    "type" => "success",
                );
        } else {
             $output = array(
                    "error_code" => 201,
                    "nama_siswa" =>  "Iuran Gagal dikirim ke ". $this->get_ID_siswa($post["id_siswa"])->nama_siswa,
                    "type" => "error",
                );
        }
        echo json_encode($output);
    }
    

    public function edit(){
        
        $post = $this->input->post();
        $this->total_iuran = $post["total_iuran"];
        $this->keterangan_iuran = $post["keterangan_iuran"];
        $this->waktu = $post["tanggal_iuran"];
        if ($this->db->update("iuran", $this, array('id_iuran' => $post["id_iuran"]))) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Diubah !</div>');
            redirect(base_url("iuran/edit/") . $post['id_iuran']);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Gagal Diubah !</div>');
            redirect(base_url("iuran/edit/") . $post['id_iuran']);
        }
    }
     public function hapus()
    {
        $post = $this->input->post();
        $id = $post["id"];
        if ($this->db->delete("iuran", array("id_iuran" => $id)) && $this->db->delete("history_transaksi", array("id_iuran" => $id))) {
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
