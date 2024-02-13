<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SISTEM INFORMASI PEMBAYARANEdit Data Admin</title>
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
                                <h4 class="card-title">Edit Data Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?=base_url()?>admin/save_edit" method="POST" autocomplete="off">
                                          <?php if ($this->session->flashdata('pesan') != null) {?>
                                            <p class="text-center"><?=$this->session->flashdata('pesan');?></p>
                                            <?php }?>
                                        <div class="form-row">
                                              <input type="hidden" name="id" value="<?=$edit->id?>"required>
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
                                                <input type="text" class="form-control" name="nama_admin" value="<?=$edit->name?>" placeholder="Nama Lengkap" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?=$edit->email?>" placeholder="user@example.com" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jabatan</label>
                                                <select name="jabatan" class="form-control" required>
                                                    <option value="<?=$edit->jabatan?>" selected=""><?=$edit->jabatan?></option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Bendahara">Bendahara</option>
                                                </select>
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
</body>

</html>
