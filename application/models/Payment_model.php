<?php

class Payment_model extends CI_Model
{

    public function list_payment($id_siswa)
    {
        $this->db->select("*");
        $this->db->from("iuran");
        $this->db->join('siswa', 'siswa.id_siswa = iuran.id_siswa');
        $this->db->join('history_transaksi', 'history_transaksi.order_id = iuran.order_id');
        $this->db->where('iuran.id_siswa', $id_siswa);
        return $this->db->get()->result();
    }
    // function data_print($id) {
   
    //         $this->db->select("*");
    //         $this->db->from("history_transaksi");
    //         $this->db->where("order_id",$id);
    //        return $this->db->get()->row();

    // }

    function data_print($id){
        $this->db->select("*");
        $this->db->from("history_transaksi");
        $this->db->join('iuran', 'iuran.order_id = history_transaksi.order_id');
        $this->db->join('siswa', 'siswa.id_siswa = iuran.id_siswa');
        $this->db->where("history_transaksi.order_id = '$id'");
        return $this->db->get()->row();
    }


        public function finish(){
                $post = $this->input->post();
        		$result = json_decode($this->input->post('result_data'),true);
        		
        		$this->order_id = $result["order_id"];
        		$this->payment_type = $result["payment_type"];
        		$this->transaction_time = $result["transaction_time"];
        		if($result["payment_type"] != "gopay"){
        		$this->bank = $result["va_numbers"][0]["bank"];
        		$this->va_number = $result["va_numbers"][0]["va_number"];
        		}else{
        		$this->bank = "";
        		$this->va_number = "-";
        		}
        		$this->status_code = $result["status_code"];
        		
        // 		$data = array(
        //         'order_id' => $result["order_id"],
        //         'payment_type' => $result["payment_type"],
        //         'transaction_time' => $result["transaction_time"],
               
        // 		'bank' => $result["va_numbers"][0]["bank"],
        // 		'va_number' => $result["va_numbers"][0]["va_number"],
        		
        // 		'status_code' => $result["status_code"],
        //         );
        		
        		
            	$data1 = array(
                'order_id' => $result["order_id"],
                );

        		if($this->db->update("history_transaksi", $this, array('id_iuran' => $post["id_iuran"])) && $this->db->update("iuran", $data1, array('id_iuran' => $post["id_iuran"]))){
        		   redirect(site_url('payment/saya'));
        		}else{
        		    redirect(site_url("payment/saya"));
        		}
        
        }
}
