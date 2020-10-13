<?php include 'global_fungsi.php';

// Jika sudah login, arahkan ke dashboard
if (sudah_login()) {
	// Tambahkan header
	include 'global_header.php';
	?>
<div class="page-content-wrapper">
<div class="page-content insert">	
	<div class="container">
		<div class="row">
			<?php // Tampilkan informasi jika ada!
			if (isset($_SESSION["informasi"])) {
				echo "<div class='alert alert-info'>".$_SESSION["informasi"]."</div>";
				unset($_SESSION["informasi"]);
			}
			?>

			<div class="well">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
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
										<div class="row">
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_nama_lengkap">
											<input type="checkbox" data-toggle="checkbox" value="nama_lengkap" id="cari_nama_lengkap" name="kategori_pencarian[]" class="custom-checkbox" checked="checked"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Nama
										</label>
										</div>
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_nis">
											<input type="checkbox" data-toggle="checkbox" value="nis" id="cari_nis" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> NIS
										</label>
										</div>
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_angkatan">
											<input type="checkbox" data-toggle="checkbox" value="angkatan" id="cari_angkatan" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Angkatan
										</label>
										</div>
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_provinsi">
											<input type="checkbox" data-toggle="checkbox" value="provinsi" id="cari_provinsi" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Provinsi
										</label>
										</div>
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_kota">
											<input type="checkbox" data-toggle="checkbox" value="kota" id="cari_kota" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Kota
										</label>
										</div>
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_tahun_masuk">
											<input type="checkbox" data-toggle="checkbox" value="tahun_masuk" id="cari_tahun_masuk" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Tahun masuk
										</label>
										</div>
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_tahun_keluar">
											<input type="checkbox" data-toggle="checkbox" value="tahun_keluar" id="cari_tahun_keluar" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Tahun keluar
										</label>
										</div>
										<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
										<label class="checkbox" for="cari_kode_pk">
											<input type="checkbox" data-toggle="checkbox" value="kode_pk" id="cari_kode_pk" name="kategori_pencarian[]" class="custom-checkbox"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span> Program Studi
										</label>
										</div>	
									</div>
								</form>
							</div>
						</div>
					</div>
					
								<?php 
									//SELURUH
									$tkj   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'TKJ' AND aktif = 'ya'");
									$n_tkj = count($tkj);

									$adm   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'ADM' AND aktif = 'ya'");
									$n_adm = count($adm);

									$rpl   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'RPL' AND aktif = 'ya'");
									$n_rpl = count($rpl);

									$tsp   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'TSP' AND aktif = 'ya'");
									$n_tsp = count($tsp);

									$pbs   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'PBS' AND aktif = 'ya'");
									$n_pbs = count($pbs);

									//LAKI_LAKI
									$tkj_l   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'TKJ' AND aktif = 'ya' AND jenis_kelamin = 'laki-laki'");
									$n_tkj_l = count($tkj_l);

									$adm_l   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'ADM' AND aktif = 'ya' AND jenis_kelamin = 'laki-laki'");
									$n_adm_l = count($adm_l);

									$rpl_l   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'RPL' AND aktif = 'ya' AND jenis_kelamin = 'laki-laki'");
									$n_rpl_l = count($rpl_l);

									$tsp_l   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'TSP' AND aktif = 'ya' AND jenis_kelamin = 'laki-laki'");
									$n_tsp_l = count($tsp_l);

									$pbs_l   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'PBS' AND aktif = 'ya' AND jenis_kelamin = 'laki-laki'");
									$n_pbs_l = count($pbs_l);
									//PEREMPUAN
									$tkj_p   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'TKJ' AND aktif = 'ya' AND jenis_kelamin = 'perempuan'");
									$n_tkj_p = count($tkj_p);

									$adm_p   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'ADM' AND aktif = 'ya' AND jenis_kelamin = 'perempuan'");
									$n_adm_p = count($adm_p);

									$rpl_p   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'RPL' AND aktif = 'ya' AND jenis_kelamin = 'perempuan'");
									$n_rpl_p = count($rpl_p);

									$tsp_p   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'TSP' AND aktif = 'ya' AND jenis_kelamin = 'perempuan'");
									$n_tsp_p = count($tsp_p);

									$pbs_p   = ambil_data_global("aluni_data_view", "id_anggota", "kode_pk = 'PBS' AND aktif = 'ya' AND jenis_kelamin = 'perempuan'");
									$n_pbs_p = count($pbs_p);
								?>
								<!-- SELURUH -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
						<div class="panel panel-default">
							<div class="panel-body">		
								<legend>Jumlah Data Alumni Berdasarkan Program Keahlian</legend>
								<div class="img-responsive">
									<canvas id="canvas_chart" style="width:100%"></canvas>
									<div><br>
										<span style="background-color:#F7464A"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Rekayasa Perangkat Lunak : <?php echo $n_rpl; ?>
										<br>
										<span style="background-color:#46BFBD"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Teknik Komputer Jaringan : <?php echo $n_tkj; ?>
										<br>
										<span style="background-color:#F0D35B"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Administrasi : <?php echo $n_adm; ?>
										<br>
										<span style="background-color:#B0539E"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Teknik Sepeda Motor : <?php echo $n_tsp; ?>
										<br>
										<span style="background-color:#6DBE4F"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Perbankan Syariah : <?php echo $n_pbs; ?>
										<br>
										<span style="background-color:#000000"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Total : <?php echo $n_rpl+$n_tkj+$n_pbs+$n_adm+$n_tsp; ?>
									</div>
								</div>
							</div>
						</div>
					</div>			
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
						<div class="panel panel-default">
							<div class="panel-body">		
								<!-- LAKI-LAKI -->
								<legend>Jumlah Data Alumni Laki-laki Berdasarkan Program Keahlian</legend>
								<div class="img-responsive">
									<canvas id="canvas_chart_l" style="width:100%"></canvas>
									<div><br>
										<span style="background-color:#F7464A"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Rekayasa Perangkat Lunak : <?php echo $n_rpl_l; ?>
										<br>
										<span style="background-color:#46BFBD"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Teknik Komputer Jaringan : <?php echo $n_tkj_l; ?>
										<br>
										<span style="background-color:#F0D35B"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Administrasi : <?php echo $n_adm_l; ?>
										<br>
										<span style="background-color:#B0539E"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Teknik Sepeda Motor : <?php echo $n_tsp_l; ?>
										<br>
										<span style="background-color:#6DBE4F"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Perbankan Syariah : <?php echo $n_pbs_l; ?>
										<br>
										<span style="background-color:#000000"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Total : <?php echo $n_rpl_l+$n_tkj_l+$n_pbs_l+$n_adm_l+$n_tsp_l; ?>
									</div>
								</div>
							</div>
						</div>
					</div>			
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
						<div class="panel panel-default">
							<div class="panel-body">
							<legend>Jumlah Data Alumni Perempuan Berdasarkan Program Keahlian</legend>
								<div class="img-responsive">
									<canvas id="canvas_chart_p" style="width:100%"></canvas>
									<div><br>
										<span style="background-color:#F7464A"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Rekayasa Perangkat Lunak : <?php echo $n_rpl_p; ?>
										<br>
										<span style="background-color:#46BFBD"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Teknik Komputer Jaringan : <?php echo $n_tkj_p; ?>
										<br>
										<span style="background-color:#F0D35B"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Administrasi : <?php echo $n_adm_p; ?>
										<br>
										<span style="background-color:#B0539E"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Teknik Sepeda Motor : <?php echo $n_tsp_p; ?>
										<br>
										<span style="background-color:#6DBE4F"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Perbankan Syariah : <?php echo $n_pbs_p; ?>
										<br>
										<span style="background-color:#000000"> &nbsp;&nbsp;&nbsp;&nbsp; </span> &nbsp; Total : <?php echo $n_rpl_p+$n_tkj_p+$n_pbs_p+$n_adm_p+$n_tsp_p; ?>
									</div>
								</div>
							</div>
						</div>
					</div>						
								<!-- Chart JS -->
								<script type="text/javascript" src="./assets/js/vendor/chartjs/Chart.min.js"></script>
								<script type="text/javascript">
									// For a pie chart
									var options = [
									    {
									        value: <?php echo $n_tkj; ?>,
									        color:"#F7464A",
									        highlight: "#FF5A5E",
									        label: "Teknik Komputer Jaringan"
									    },
									    {
									        value: <?php echo $n_rpl; ?>,
									        color: "#46BFBD",
									        highlight: "#5AD3D1",
									        label: "Rekayasa Perangkat Lunak"
									    },
									    {
									        value: <?php echo $n_pbs; ?>,
									        color: "#6DBE4F",
									        highlight: "#86C552",
									        label: "Perbankan Syariah"
									    },
									    {
									        value: <?php echo $n_adm; ?>,
									        color: "#F0D35B",
									        highlight: "#EAC233",
									        label: "Administrasi"
									    },
									    {
									        value: <?php echo $n_tsp; ?>,
									        color: "#B0539E",
									        highlight: "#A34899",
									        label: "Teknik Sepeda Motor"
									    }
									];
									var options_l = [
									    {
									        value: <?php echo $n_tkj_l; ?>,
									        color:"#F7464A",
									        highlight: "#FF5A5E",
									        label: "Teknik Komputer Jaringan"
									    },
									    {
									        value: <?php echo $n_rpl_l; ?>,
									        color: "#46BFBD",
									        highlight: "#5AD3D1",
									        label: "Rekayasa Perangkat Lunak"
									    },
									    {
									        value: <?php echo $n_pbs_l; ?>,
									        color: "#6DBE4F",
									        highlight: "#86C552",
									        label: "Perbankan Syariah"
									    },
									    {
									        value: <?php echo $n_adm_l; ?>,
									        color: "#F0D35B",
									        highlight: "#EAC233",
									        label: "Administrasi"
									    },
									    {
									        value: <?php echo $n_tsp_l; ?>,
									        color: "#B0539E",
									        highlight: "#A34899",
									        label: "Teknik Sepeda Motor"
									    }
									];
									var options_p = [
									    {
									        value: <?php echo $n_tkj_p; ?>,
									        color:"#F7464A",
									        highlight: "#FF5A5E",
									        label: "Teknik Komputer Jaringan"
									    },
									    {
									        value: <?php echo $n_rpl_p; ?>,
									        color: "#46BFBD",
									        highlight: "#5AD3D1",
									        label: "Rekayasa Perangkat Lunak"
									    },
									    {
									        value: <?php echo $n_pbs_p; ?>,
									        color: "#6DBE4F",
									        highlight: "#86C552",
									        label: "Perbankan Syariah"
									    },
									    {
									        value: <?php echo $n_adm_p; ?>,
									        color: "#F0D35B",
									        highlight: "#EAC233",
									        label: "Administrasi"
									    },
									    {
									        value: <?php echo $n_tsp_p; ?>,
									        color: "#B0539E",
									        highlight: "#A34899",
									        label: "Teknik Sepeda Motor"
									    }
									];
									window.onload = function(){
										var ctx      = document.getElementById("canvas_chart").getContext("2d");
										window.myPie = new Chart(ctx).Pie(options, {
										    animateScale: true

										});

										var ctl      = document.getElementById("canvas_chart_l").getContext("2d");
										window.myPie = new Chart(ctl).Pie(options_l, {
										    animateScale: true

										});

										var ctp      = document.getElementById("canvas_chart_p").getContext("2d");
										window.myPie = new Chart(ctp).Pie(options_p, {
										    animateScale: true

										});
									};
								</script>
				</div>
			</div>
		</div>
	</div>
</div></div>
	<?php
}
else {
	header("Location: ./login.php");
	die();
}

?>