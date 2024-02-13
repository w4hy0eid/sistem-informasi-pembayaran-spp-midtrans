<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SISTEM INFORMASI PEMBAYARANTambah Data Siswa</title>
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
                                <h4 class="card-title">Tambah Data Siswa</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?=base_url()?>siswa/save" method="POST" autocomplete="off">
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                                <div id="pesan_error"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Lengkap" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>NIS</label>
                                                <input type="text" class="form-control" name="nis_siswa" placeholder="Nomor Induk Siswa" maxlength="16" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Kelas Siswa</label>
                                                <input type="text" class="form-control" name="kelas_siswa" placeholder="Kelas" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kode Kelas</label>
                                                <input type="text" class="form-control" name="no_kelas_siswa" placeholder="Kode Kelas" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nama Orang Tua</label>
                                                <input type="text" class="form-control" name="nama_ortu" placeholder="Kode Kelas" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
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
<script>
        $(document).ready(function() {
		$('#username').keyup(function() {
			var username = $('#username').val();
			if(username == 0) {
				$('#result').text('');
			}
			else {
				$.ajax({
					url: '<?=site_url('siswa/cek_user');?>',
					type: 'POST',
					data: 'username='+username,
					success: function(hasil) {
						if(hasil == 0) {
							$('#pesan_error').html('<font color=green>Username Bisa Dipakai.</font>');
						}
						else {
							$('#pesan_error').html('<font color=red>Username Sudah ada.</font>');
						}
					}
				});
			}
		});
	});
    $(document).ready(function() {
		$('#email').keyup(function() {
			var email = $('#email').val();
			if(email == 0) {
				$('#result').text('');
			}
			else {
				$.ajax({
					url: '<?=site_url('admin/cek_email');?>',
					type: 'POST',
					data: 'email='+email,
					success: function(hasil) {
						if(hasil == 0) {
							$('#pesan_error2').html('<font color=green>Email Bisa Dipakai.</font>');
						}
						else {
							$('#pesan_error2').html('<font color=red>Email Sudah ada.</font>');
						}
					}
				});
			}
		});
	});
</script>
</html>
