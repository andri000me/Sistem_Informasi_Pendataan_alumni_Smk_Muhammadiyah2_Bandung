<?php include 'global_fungsi.php';

// Jika sudah login, arahkan ke dashboard
if (sudah_login() && (strpos($_SESSION['a2_hak_akses'], '003')!==FALSE || $_SESSION['a2_hak_akses']=="*")) {
	// Tambahkan header
	include 'global_header.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="panel panel-default">
					<?php // Tampilkan informasi jika ada!
					if (isset($_SESSION["informasi"])) {
						echo "<div class='alert alert-info'>".$_SESSION["informasi"]."</div>";
						unset($_SESSION["informasi"]);
					}
					?>
					<div class="panel-body">
					<form action="proses.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="hidden" name="aksi" id="aksi" value="tambah_pk">
						<label class="col-lg-3 col-md-3 col-sm-5 control-label">
							Program Keahlian
						</label>
						<div class="col-lg-8 col-md-8 col-sm-6">
							<input type="text" name="pk" id="pk" class="form-control" placeholder="Program Keahlian">
						</div>
					</div>
					<!-- Nama Anak -->
					<div class="form-group">
						<label class="col-lg-3 col-md-3 col-sm-5 control-label">
							Deskripsi
						</label>
						<div class="col-lg-3 col-md-3 col-sm-5 control-label">
							<input type="text" name="des" id="des" class="form-control" placeholder="Deskripsi">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-3 col-md-3 col-sm-5 control-label">
							<button type="submit" class="btn btn-primary btn-lg" id="proses_simpan">Simpan</button>
						</div>
					</div>
					</form>	
				</div>
			</div>		
		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="panel panel-default">
					<div class="panel-body">
						<legend>Daftar Program Keahlian</legend>
						<?php 
							$daftar_anggota = ambil_data_global("aluni_program_keahlian", "*");
							if (count($daftar_anggota)>0) {
								?>
								<table class="table table-striped datatable">
									<thead>
										<tr>
											<th>No</th>
											<th>Program Keahlian</th>
											<th>Deskripsi</th>
											<th>#</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$no = 0;
										foreach ($daftar_anggota as $data) {
											$no++;
											?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $data["pk"]; ?></td>
												<td><?php echo $data["deskripsi"]; ?></td>
												<td>
													<?php if (strpos($_SESSION['a2_hak_akses'], '003')!==FALSE || $_SESSION['a2_hak_akses']=="*"): ?>
													<a href="ubah_pk.php?ida=<?php echo $data["kode_pk"].hash("md5", rand()); ?>" class="btn btn-sm btn-primary">Ubah&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
													<?php endif ?>
												</td>
											</tr>
											<?php
										}
									?>
									</tbody>
								</table>
								<?php
							}
							else {
								echo "<p class='text-center'>Tidak Ada Data!</p>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	</div>

	<?php
	// Tambahkan footer
	include 'global_footer.php';

	?>
	<?php
}
else {
	header("Location: ./login.php");
	die();
}

?>