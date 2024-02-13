<?php

class Dashboard_model extends CI_Model
{

    public function Get_ID()
    {
        $this->db->select("*");
        $this->db->from("siswa");
        $this->db->where("username", $this->session->userdata('SES-SISFO'));
        return $this->db->get()->row();
    }

    public function Get_pay($id)
    {
        $this->db->select("*");
        $this->db->from("history_transaksi");
        $this->db->where("order_id",$id);
        return $this->db->get()->row();
    }
    
    public function Total_Iuran(){
        $this->db->select("*");
        $this->db->select_sum('iuran.total_iuran', 'grand_total_iuran');
        $this->db->from("iuran");
        $this->db->join('history_transaksi', 'history_transaksi.order_id = iuran.order_id');
        $this->db->where('history_transaksi.status_code', "200");
        return $this->db->get()->row();
    }
    
    public function Total_Warga()
    {
        $this->db->select("*");
        $this->db->from("siswa");
        return $this->db->get()->num_rows();
    }
    
}
