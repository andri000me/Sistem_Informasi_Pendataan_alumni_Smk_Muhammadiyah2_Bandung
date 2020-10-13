<?php include 'global_fungsi.php';

// Jika sudah login, arahkan ke dashboard
if (sudah_login() && (strpos($_SESSION['a2_hak_akses'], '003')!==FALSE || $_SESSION['a2_hak_akses']=="*")) {
	// Tambahkan header
	include 'global_header.php';

	// Ambil data anggota
	$id_pk = substr($_GET["ida"], 0, 1);
	$datas      = ambil_data_global("aluni_program_keahlian", "*", "kode_pk = '$id_pk'");
	foreach ($datas as $data) {
		$pk  			= $data["pk"];
		$deskripsi  	= $data["deskripsi"];
		$kode_pk  		= $data["kode_pk"];
	}

	?>
	<div class="container">
		<div class="row">
			<?php // Tampilkan informasi jika ada!
			if (isset($_SESSION["informasi"])) {
				echo "<div class='alert alert-info'>".$_SESSION["informasi"]."</div>";
				unset($_SESSION["informasi"]);
			}
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="panel panel-default">
					<div class="panel-body">
						<legend>Ubah Program Keahlian</legend>
						<form action="proses.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="hidden" name="aksi" id="aksi" value="ubah_pk">
						<label class="col-lg-3 col-md-3 col-sm-5 control-label">
							Program Keahlian
						</label>
						<div class="col-lg-8 col-md-8 col-sm-6">
							<input type="text" name="pk" id="pk" class="form-control" placeholder="Program Keahlian" value="<?php echo $pk ?>">
						</div>
					</div>
					<!-- Nama Anak -->
					<div class="form-group">
						<label class="col-lg-3 col-md-3 col-sm-5 control-label">
							Deskripsi
						</label>
						<div class="col-lg-3 col-md-3 col-sm-5 control-label">
							<input type="text" name="des" id="des" class="form-control" placeholder="Deskripsi" value="<?php echo $deskripsi ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-3 col-md-3 col-sm-5 control-label">
							<input type="hidden" name="kode_pk" id="kode_pk" class="form-control" placeholder="Deskripsi" value="<?php echo $kode_pk ?>">
						</div>
					</div>
				</div>
					<div class="well text-center">
								<button type="submit" class="btn btn-primary btn-lg" id="ubah_pk">Ubah &nbsp;<span class="glyphicon glyphicon-edit"></span></button>
							</div>
						</form>
					</div>
				</div>

<?php
	// Tambah footer
	include 'global_footer.php';
}
else {
	header("Location: ./login.php");
	die();
}

?>