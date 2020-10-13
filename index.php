<?php include 'global_fungsi.php';

// Jika sudah login, arahkan ke dashboard
if (sudah_login()) {
	header("Location: ./dashboard.php");
	die();
}
else {
	// Tambahkan header
	include 'global_header.php';
	?>

	<div class="row" style="background-color: #0D384A; margin-top:-17px">
		<div class="col-lg-5">
			<div class="col-sm-3">
				<div class="gambar" style="margin: 20px; padding-left: 20px">
					<a href="#"><img class="img img-circle" src="assets/img/logo.jpg" alt="Logo" width="60" height="60" style="margin-top: 3px"></a></div>
			</div>
			<div class="col-sm-9" style="margin-top: 20px;color: #FFFFFF">		
				Sistem Informasi Alumni<br>
				SMK MUHAMMADIYAH 2 CIBIRU
			</div>
		</div>	
		<div class="col-lg-7">
			<div class="col-sm-3" style="margin: 30px;border-left: 1pt #fff solid; font-size: 10pt;">
				<a href="" style="text-decoration: none"><strong>Home</strong><br>
				Alumni SMKM2C</a>
			</div>
			<div class="col-sm-3" style="margin: 30px;border-left: 1pt #fff solid; font-size: 10pt ">
				<a href=""><strong>Tentang Kami</strong><br>
				Alumni SMKM2C</a>
			</div>	
			<div class="col-sm-3" style="margin: 30px;border-left: 1pt #fff solid; font-size: 10pt ">
				<a href=""><strong>Informasi</strong><br>
				Alumni SMKM2C</a>
			</div>		
		</div>		
	</div>
	<br>	

	<div class="row">
		<div class="container">
			<?php // Tampilkan informasi jika ada!
			if (isset($_SESSION["informasi"])) {
				echo "<div class='alert alert-info'>".$_SESSION["informasi"]."</div>";
				unset($_SESSION["informasi"]);
			}
			?>

			<div class="well">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
						<div class="panel panel-default">
							<div class="panel-body">
								<legend>Pencarian Data Alumni</legend>
								<form action="pencarian.php" method="post">
									<div class="form-group">
										<div class="input-group">
											<input type="hidden" name="aksi" id="aksi" value="cari">
											<input type="text" name="kata_kunci" id="kata_kunci" required class="form-control" placeholder="Kata Kunci">
											<div class="input-group-btn">
												<button class="btn btn-default" type="submit"><i class="fui-search"></i> Cari</button>
											</div>
										</div>
									</div>
									<div class="form-group">
										
										<label class="checkbox" for="cari_nama_lengkap">
											<input type="checkbox" data-toggle="checkbox" value="nama_lengkap" id="cari_nama_lengkap" name="kategori_pencarian[]" class="custom-checkbox" checked="checked"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Nama
										</label>
										<label class="checkbox" for="cari_nis">
											<input type="checkbox" data-toggle="checkbox" value="nis" id="cari_nis" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> NIS
										</label>
										<label class="checkbox" for="cari_angkatan">
											<input type="checkbox" data-toggle="checkbox" value="angkatan" id="cari_angkatan" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Angkatan
										</label>
										<label class="checkbox" for="cari_provinsi">
											<input type="checkbox" data-toggle="checkbox" value="provinsi" id="cari_provinsi" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Provinsi
										</label>
										<label class="checkbox" for="cari_kota">
											<input type="checkbox" data-toggle="checkbox" value="kota" id="cari_kota" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Kota
										</label>
										<label class="checkbox" for="cari_tahun_masuk">
											<input type="checkbox" data-toggle="checkbox" value="tahun_masuk" id="cari_tahun_masuk" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Tahun masuk
										</label>
										<label class="checkbox" for="cari_tahun_keluar">
											<input type="checkbox" data-toggle="checkbox" value="tahun_keluar" id="cari_tahun_keluar" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Tahun keluar
										</label>
										<label class="checkbox" for="cari_kode_pk">
											<input type="checkbox" data-toggle="checkbox" value="kode_pk" id="cari_kode_pk" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Program Studi
										</label>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
						<div class="panel panel-default">
							<div class="panel-body">
								<h5><?php echo $setting_sistem["nama_sistem"]; ?></h5>
								<h5>Lokasi :</h5> <?php echo $setting_sistem["lokasi_sistem"]; ?>
								<h5>Keterangan :</h5> <?php echo $setting_sistem["keterangan_sistem"]; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	// Include footer
	include 'global_footer.php';
}
?>