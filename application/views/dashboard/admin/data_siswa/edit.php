<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SISTEM INFORMASI PEMBAYARANEdit Data Warga</title>
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
                                <h4 class="card-title">Edit Data Siswa</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?=base_url()?>siswa/save_edit" method="POST" autocomplete="off">
                                          <?php if ($this->session->flashdata('pesan') != null) {?>
                                            <p class="text-center"><?=$this->session->flashdata('pesan');?></p>
                                            <?php }?>
                                        <div class="form-row">
                                             <input type="hidden" name="id_siswa" value="<?=$edit->id_siswa?>"required>
                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" value="<?=$edit->username?>" placeholder="Username" readonly="true" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                                <p class="text-xs text-danger">*Kosongkan jika tidak merubah, isi jika ingin merubah.</p>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_siswa" value="<?=$edit->nama_siswa?>" placeholder="Nama Lengkap" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>NIS</label>
                                                <input type="text" class="form-control" name="nis_siswa" value="<?=$edit->nis_siswa?>" placeholder="Nomor Induk Siswa" maxlength="16" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Kelas</label>
                                                <input type="text" class="form-control" name="kelas_siswa" value="<?=$edit->kelas_siswa?>" placeholder="Nomor Kartu Keluarga" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kode Kelas</label>
                                                <input type="text" class="form-control" name="no_kelas_siswa" value="<?=$edit->no_kelas_siswa?>" placeholder="Jumlah Anggota Keluarga" required>
                                            </div>
                                        
                                            <div class="form-group col-md-6">
                                                <label>Nama Orang Tua</label>
                                                <input type="text" class="form-control" name="nama_ortu"  value="<?=$edit->nama_ortu?>" placeholder="Kode Kelas" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" value="<?=$edit->alamat?>" placeholder="Alamat" required>
                                            </div>
                                         
                                            <?php if($edit->aktivasi == 0 || $edit->aktivasi == ""){?>
                                            <div class="form-group col-md-6">
                                                <label>Aktivasi</label>
                                                <select name="aktivasi" class="form-control" required>
                                                    <option selected="">Pilih Status Aktivasi...</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Belum Aktif</option>
                                                </select>
                                                </div>
                                            <?php } ?>

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
</body>

</html>
