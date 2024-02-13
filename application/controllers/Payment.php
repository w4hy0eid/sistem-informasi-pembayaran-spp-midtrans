<?php

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('iuran_model');
        $this->load->model('payment_model');
        $this->load->model('dashboard_model');
        //Midtrans
        $params = array('server_key' => SERVERKEY, 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        //Veritrans
        $this->load->library('veritrans');
        $this->veritrans->config($params);
    }

    public function saya()
    {
        $data["list"] = $this->payment_model->list_payment($this->dashboard_model->Get_ID()->id_siswa);
        
        $this->load->view("dashboard/siswa/payment/list", $data);
    }

    function print($id = null) {
        if (!isset($id)) {
            redirect(site_url());
        }
        $this->load->library('pdf');
        $data["list"] = $this->payment_model->list_payment($this->dashboard_model->Get_ID()->id_siswa);
        $data["data"] = $this->payment_model->data_print($id);
        
       
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml(ob_get_clean());
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Kwintasi.pdf";
        $this->pdf->load_view('dashboard/siswa/payment/kwitansi',$data);
    }


    public function token()
    {

        $post = $this->input->post();
        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $this->iuran_model->data_iuran($post["id_iuran"])->total_iuran, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => $this->iuran_model->data_iuran($post["id_iuran"])->total_iuran,
            'quantity' => 1,
            'name' => $this->iuran_model->data_iuran($post["id_iuran"])->keterangan_iuran,
        );

        // Optional
        $item_details = $item1_details;

        // Optional
        $customer_details = array(
            'first_name' => $this->iuran_model->data_iuran($post["id_iuran"])->nama_siswa,
            'email' => $this->iuran_model->data_iuran($post["id_iuran"])->username . "@sisfo.com",
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration' => 1,
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'credit_card' => $credit_card,
            'expiry' => $custom_expiry,
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'credit_card' => $credit_card,
            'expiry' => $custom_expiry,
        );

        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        echo $snapToken;
    }
    
    	public function finish()
	{
	    $this->payment_model->finish();
	}
	
    public function notification(){
	    echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		print_r($json_result);
		$result = json_decode($json_result, true);
		if($result["status_code"] == 200){
		    	$this->db->set('status_code', $result["status_code"], FALSE);
		    	$this->db->where('order_id', $result["order_id"]);
			    $this->db->update('history_transaksi');
		}
	}
	
}
