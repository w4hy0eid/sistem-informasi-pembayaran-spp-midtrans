<div class="quixnav">
	<div class="quixnav-scroll">
		<ul class="metismenu" id="menu">
			<li class="nav-label first">Main Menu</li>
			<li><a href="<?=base_url()?>" aria-expanded="false"><i class="icon icon-home"></i><span
						class="nav-text">Dashboard</span></a></li>
						</li>
            
			<?php if ($this->session->userdata('SES-ROLE') == "Admin") {?>
			
			<li><a href="<?=base_url()?>admin/saya"><i class="fa fa-user"></i>Data Saya</a></li>
			<li><a href="<?=base_url()?>admin"><i class="icon icon-app-store"></i>Data Admin</a></li>
			<li><a href="<?=base_url()?>siswa"><i class="icon icon-app-store"></i>Data Siswa</a></li>
			<li><a href="<?=base_url()?>iuran"><i class="icon icon-app-store"></i>Data Iuran</a></li>

			<!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
						class="icon icon-app-store"></i><span class="nav-text">Data Iuran</span></a>
				<ul aria-expanded="false">
					<li><a href="<?=base_url()?>iuran">List Data Iuran</a></li>
					<li><a href="<?=base_url()?>iuran/add_mass">Tambah Semua Siswa</a></li>
					<li><a href="<?=base_url()?>iuran/add_one">Tambah Perseorangan</a></li>
				</ul>
			</li> -->
            <!-- <li><a href="<?=base_url()?>admin/pengaturan"><i class="fa fa-cog"></i>Pengaturan</a></li> -->
			<!--<li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i-->
			<!--			class="icon icon-app-store"></i><span class="nav-text">Data Pembayaran</span></a>-->
			<!--	<ul aria-expanded="false">-->
			<!--		<li><a href="<?=base_url()?>assets/app-profile.html">List Data Pembayaran</a></li>-->
			<!--	</ul>-->
			<!--</li>-->

			<?php }elseif($this->session->userdata('SES-ROLE') == "Siswa"){?>

			<li><a href="<?=base_url()?>siswa/saya"><i class="fa fa-user"></i>Data Saya</a></li>
			<li><a href="<?=base_url()?>payment/saya"><i class="fa fa-usd"></i>Pembayaran</a></li>
			
			<?php }else{?>
				<li><a href="<?=base_url()?>admin/saya"><i class="fa fa-user"></i>Data Saya</a></li>
				<li><a href="<?=base_url()?>iuran"><i class="icon icon-app-store"></i>Data Iuran</a></li>
			<?php }?>
			<li><a href="<?=base_url()?>login/logout"><i class="fa fa-key"></i>Logout</a></li>
		</ul>
	</div>
	

</div>
