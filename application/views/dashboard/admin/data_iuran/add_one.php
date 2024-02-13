<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SISTEM INFORMASI PEMBAYARANTambah Data Iuran Siswa Perseorangan</title>
    <?php $this->load->view("dashboard/partials/css")?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                    <form action="<?=base_url()?>iuran/save_one" method="POST" autocomplete="off">
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label>Pilih siswa</label>
                                              <select class="select-siswa" name="id_siswa">
                                                <?php foreach ($list as $siswa):?>  
                                              <option value="<?=$siswa->id_siswa?>"><?=$siswa->nama_siswa?></option>
                                                <?php endforeach?>
                                            </select>
                                            </div>
                                    
                                            <div class="form-group col-md-6">
                                                <label>Total Iuran</label>
                                                <input type="text" class="form-control" name="total_iuran" placeholder="Total Iuran" required>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal_iuran"  required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Keterangan Iuran</label>
                                              <textarea class="form-control" rows="3" name="keterangan_iuran"></textarea>
                                            </div>
                                           

                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
                                    </form>
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
    <?php $this->load->view("dashboard/partials/js")?>
    <!-- Datatable -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.select-siswa').select2();
        });
    </script>
</body>

</html>
