<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SISTEM INFORMASI PEMBAYARAN SPP </title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/favicon.png">
	<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
	<div class="authincation h-100">
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100 align-items-center" style="  background-color:#3457ee;">
				<div class="col-md-4">
					<div class="authincation-content">
						<div class="row no-gutters">
							<div class="col-xl-12">
								<div class="auth-form ">
									<div class="text-center">
								<img src="<?=base_url()?>assets/images/logo-smk.png" alt="" width="200" height="200">
</div>	
									<h4 class="text-center mb-4">MASUK</h4>
                                    <?php if ($this->session->flashdata('pesan') != null) {?>
                                            <p class="text-center"><?=$this->session->flashdata('pesan');?></p>
                                            <?php }?>
                                            <form action="<?=base_url("login/doLogin")?>" method="post">
										<div class="form-group">
											<label><strong>Username</strong></label>
											<input type="text" class="form-control" name="username" placeholder="Username" required>
										</div>
										<div class="form-group">
											<label><strong>Password</strong></label>
											<input type="password" class="form-control" name="password" placeholder="Password" required>
										</div>
									
										<div class="text-center">
											<button type="submit" class="btn btn-primary btn-block">MASUK</button>
										</div>
									</form>
									 <!-- <div class="new-account mt-3">
										<p>Belum Terdaftar? <a class="text-primary" href="<?=base_url()?>login/register">DAFTAR</a></p>
									</div> -->
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
