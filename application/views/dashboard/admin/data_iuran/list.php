<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SISTEM INFORMASI PEMBAYARANList Data Iuran</title>
    <link href="<?=base_url()?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
            <div class="container-fluid">

                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data SPP</h4>
                            </div>
                            <?php if ($this->session->userdata('SES-ROLE') == "Admin") {?>
                            <div class="col text-right">
                            <a href="<?=base_url()?>iuran/add_one" class="btn btn-facebook">Tambah Data Perorangan <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                            <a href="<?=base_url()?>iuran/add_mass" class="btn btn-instagram">Tambah Data Semua <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                            </div><?php }?>
                            <form id="formlaporan" action="<?=base_url()?>iuran/print_laporan" method="post">
                            <div class="row text-right">
                                 <div class="col-2 mt-0 ">
												<span></span>
											</div>
											<div class="col-2">
											
                              <div class="col-6 mt-1 ">
                                </div>
												<span></span>
											</div>
											<div class="col-2">
												<input type="text" name="tahun" id="datepicker" class="form-control" value="Tahun">
											</div>
		
                                            <div class="col-1">
                                            <button type="submit" class="btn btn-md btn-success btn-icon-split">
													<span class="icon"><i class="fa fa-print"></i> Print</span>
												</button>
                                            </div>
										</div>
                                </form>
                             <?php if ($this->session->flashdata('pesan') != null) {?>
                                            <p class="text-center"><?=$this->session->flashdata('pesan');?></p>
                                            <?php }?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px; color:black;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Pembayaran</th>
                                                <th>Nama</th>
                                                <th>Total Iuran</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;foreach ($list as $iuran): ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$iuran->order_id?></td>
                                                <td><?=$iuran->nama_siswa?></td>
                                                <td><?="Rp " . number_format($iuran->total_iuran, 0, ',', '.')?></td>
                                                <td><?=$iuran->keterangan_iuran?></td>
                                                <td><?php if ($iuran->status_code == 200) {?><button type="button" class="btn btn-success">LUNAS</button><?php } else {?><button type="button" class="btn btn-danger">BELUM LUNAS</button><?php }?></td>
                                                <td><a href="<?= base_url()?>iuran/edit/<?=$iuran->id_iuran?>"class="btn btn-primary"><i class="fa fa-pencil"></i></a> <button id="<?=$iuran->id_iuran?>" class="btn btn-danger delete"><i class="fa fa-trash"></i></button></td>
                                                
                                            </tr>
                                            <?php endforeach?>

                                        </tbody>

                                    </table>
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
    <!-- Datatable -->
    <script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins-init/datatables.init.js"></script>
    <!-- datepicker -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script type="text/javascript">
 $("#datepicker").datepicker({
    format: "yyyy-mm",
    viewMode: "months", 
    minViewMode: "months"
});

    //Delete Data POH
    $(document).ready(function() {
      $(".delete").click(function() {
            swal({
                    title: "Yakin ingin menghapus Data Iuran siswa?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var id = $(this).attr('id');
                        $.ajax({
                            method: 'post',
                            url:  "<?=base_url()?>iuran/hapus",
                            data: {
                                id: id,
                            },
                            success: function(result) {
                                d = JSON.parse(result);
                                if (d.message == "success") {
                                    swal({
                                        text: "Data Berhasil dihapus !",
                                        icon: "success",
                                        button: false,
                                        timer: 1500,
                                    });
                                    setTimeout(function() {
                                      window.location = "<?=base_url()?>iuran";
                                  }, 2000);
                                } else {
                                    swal({
                                        text: "Data Gagal dihapus !",
                                        icon: "error",
                                        button: false,
                                        timer: 1500,
                                    });
                                }

                            }
                        });
                    }

                });
        });
    });
     </script>
</body>

</html>
