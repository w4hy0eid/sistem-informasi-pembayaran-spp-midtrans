<?php 

class Admin extends CI_Controller {
    
   public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('admin_model');
        if ($this->login_model->isNotLogin()) {
            redirect(site_url("login"));
        }
    }

    public function index()
    {
        $data["list"] = $this->admin_model->list();
        $this->load->view("dashboard/admin/data_admin/list", $data);
    }
    
    public function add()
    {
        $this->load->view("dashboard/admin/data_admin/add");
    }
     
    public function pengaturan()
    {
        $data["data"] = $this->admin_model->data_pengaturan();
        $this->load->view("dashboard/admin/pengaturan/pengaturan",$data);
    }

    public function cek_user(){
        $username = $this->input->post('username'); 
        $sql = $this->db->query("SELECT username FROM user WHERE username='$username'");
        $cek_user = $sql->num_rows();
        echo $cek_user;
    }  
    public function cek_email(){
        $email = $this->input->post('email'); 
        $sql = $this->db->query("SELECT email FROM user WHERE email='$email'");
        $cek_email = $sql->num_rows();
        echo $cek_email;
    }  
      
    public function saya(){
        $data["edit"] = $this->admin_model->data_saya();
        $this->load->view("dashboard/admin/data_admin/saya",$data);
    }
    
     public function edit($id = null){
        if(!$id){
            redirect(site_url());
        }
        
        $data["edit"] = $this->admin_model->data_admin($id);
        $this->load->view("dashboard/admin/data_admin/edit",$data);
    }
    
    public function save()
    {
        
        $this->admin_model->save();
    }
    
     public function save_saya()
    {
        $this->admin_model->save_saya();
    }
    
    public function save_edit(){
        $this->admin_model->edit();
    }
    
    public function save_pengaturan(){
        $this->admin_model->save_pengaturan();
    }
    
    public function hapus(){
        $this->admin_model->hapus();
    }
}