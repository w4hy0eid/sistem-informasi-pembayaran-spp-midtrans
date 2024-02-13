<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SISFO </title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/favicon.png">
	<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
	<div class="authincation h-100">
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100 align-items-center">
				<div class="col-md-6">
					<div class="authincation-content">
						<div class="row no-gutters">
							<div class="col-xl-12">
								<div class="auth-form">
									<h4 class="text-center mb-4">DAFTAR</h4>
                                    <?php if ($this->session->flashdata('pesan') != null) {?>
                                            <p class="text-center"><?=$this->session->flashdata('pesan');?></p>
                                            <?php }?>
                                           <form action="<?=base_url()?>login/save_register" method="POST" autocomplete="off">
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama_warga" placeholder="Nama Lengkap" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>NIK</label>
                                                <input type="text" class="form-control" name="nik_warga" placeholder="Nomor Induk Siswa" maxlength="16" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Nomor KK</label>
                                                <input type="text" class="form-control" name="kk_warga" placeholder="Nomor Kartu Keluarga" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jumlah Anggota Keluarga</label>
                                                <input type="text" class="form-control" name="no_kelas_siswa" placeholder="Jumlah Anggota Keluarga" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Agama</label>
                                                <select name="agama_warga" class="form-control" required>
                                                    <option selected="">Pilih Agama..</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Khonghucu">Khonghucu</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Status</label>
                                                <select name="status_warga" class="form-control" required>
                                                    <option selected="">Pilih Status..</option>
                                                    <option value="Kawin">Kawin</option>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                    <option value="Cerai">Cerai</option>
                                                    <option value="Meninggal">Meninggal</option>
                                                </select>
                                                </div>





                                        </div>
                                        	<div class="text-center">
											<button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
										</div>
                                    </form>
									 <div class="new-account mt-3">
										<p>Sudah Mendaftar? <a class="text-primary" href="<?=base_url()?>login">MASUK</a></p>
									</div> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="<?=base_url()?>assets/vendor/global/global.min.js"></script>
	<script src="<?=base_url()?>assets/js/quixnav-init.js"></script>
	<script src="<?=base_url()?>assets/js/custom.min.js"></script>

</body>

</html>
