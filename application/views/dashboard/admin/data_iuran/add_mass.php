<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SISTEM INFORMASI PEMBAYARANTambah Data Iuran Siswa Perseorangan</title>
    <?php $this->load->view("dashboard/partials/css")?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <?php $this->load->view("dashboard/partials/header")?>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <?php $this->load->view("dashboard/partials/sidebar")?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
       <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container">

                <!-- row -->

                <div class="row">
                    <div class="col-xl-12 col-xxl-12">

                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data Iuran</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <!--<form autocomplete="off">-->
                                        <div class="form-row">
                                            <textarea id="id_siswa" name="id_siswa" hidden><?php foreach ($list as $siswa){ echo $siswa->id_siswa."\n"; }?></textarea>
                                            <div class="form-group col-md-6">
                                                <label>Total Iuran</label>
                                                <input type="text" class="form-control" id="total_iuran" name="total_iuran" placeholder="Total Iuran" required>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal_iuran" name="tanggal_iuran" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Keterangan Iuran</label>
                                              <textarea class="form-control" rows="3" id="keterangan_iuran" name="keterangan_iuran"></textarea>
                                            </div>
                                           

                                        </div>
                                        <button class="btn btn-primary simpan"><i class="fa fa-save"></i> SIMPAN</button>
                                    <!--</form>-->
                                    
                                    
                                  
                                </div>
                            </div>
                            <center><div class="col-md-6" id="loader"></div></center>
                              <div class="card">
                                         <div class="card-body">
                                             <div class="form-group col-md-12">
                                                <label>Progres</label>
                                                <textarea class="form-control" id="hasil" rows="3" readonly="true"></textarea>
                                            </div>
                                            
                                             </div>
                                             </div>
                        </div>




                    </div>

                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php $this->load->view("dashboard/partials/footer")?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
     <script src="<?=base_url()?>assets/js/jquery-3.5.1.min.js"></script>
      <script src="<?=base_url()?>assets/js/sweetalert.min.js"></script>
    <?php $this->load->view("dashboard/partials/js")?>
 
  <script>
    $(document).ready(function() {
      $(".simpan").click(function() {
        var id_siswa = $("#id_siswa").val().split('\n');
        var total_iuran = $("#total_iuran").val();
        var keterangan_iuran = $("#keterangan_iuran").val();
        var tanggal_iuran = $("#tanggal_iuran").val();
        var current = 0;
        var total = id_siswa.length;
         if (id_siswa.length == 0 || total_iuran.length == 0 || keterangan_iuran.length == 0 || tanggal_iuran.length == 0) {
            swal({
                text: "Form Tidak Boleh Kosong !",
                icon: "error",
                button: false,
                timer: 1500,
              });
        } else {
        for (let i = 0; i < id_siswa.length-1; i++) { 
        var idnya = id_siswa[i];
		$("#loader").html('<h5 style="color: #FFF;font-weight: bold;"><b>Dalam Proses .... ' + idnya + '</b></h5><div class="progress progress-striped active"><div class="progress-bar" style="width: 50%"></div></div>');
         $.ajax({
                    url: '<?=base_url()?>iuran/save_mass',
                    cache: false,
                    method: 'post',
                    data: {
                        id_siswa: idnya,
                        total_iuran: total_iuran,
                        keterangan_iuran: keterangan_iuran,
                        tanggal_iuran: tanggal_iuran,
                    },
                    success: function(result) {
                        d = JSON.parse(result);
                        if(d.type == "success"){
                          	$('#hasil').append(d.message+"\n");
                        }else{
                        	$('#hasil').append(d.message+"\n");
                        }
                    }
         });
         }
         
         
          $("#loader").html('');
			alert('DONE');

                    
        
        }
      });
      });
    </script>
</body>

</html>
