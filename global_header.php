<?php 
	// Ambil data sistem 
	$setting_sistem = setting_sistem();
?>
<html>
	<head>
		<title><?php echo $setting_sistem["nama_sistem"]; ?></title>
		<script type="text/javascript" src="./assets/js/vendor/jquery.min.js"></script>
		<script type="text/javascript" src="./assets/js/flat-ui.min.js"></script>
		<link rel="stylesheet" href="./assets/css/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="./assets/css/flat-ui.min.css">
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="./assets/js/vendor/html5shiv.js"></script>
			<script src="./assets/js/vendor/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="./assets/img/logo.jpg">
		<style type="text/css">
			body {
				padding-top: 70px;
			}
			#wrapper{
				padding-left: 70px;
				transition: all .4s ease 0s;
				height: 100%;
			}
			#sidebar-wrapper{
				margin-left: -150px;
				left: 70px;
				width: 150px;
				background-color: #0D384A;
				position: fixed;
				height: 100%;
				z-index: 10000;
				transition: all .4s ease 0s;
			}
			.sidebar-nav{
				display: block;
				float: left;
				width: 150px;
				list-style: none;
				margin: 0;
				padding: 0;
			}
			#page-content-wrapper{
				padding-left: 0;
				margin-left: 0;
				width: 100%;
				height: auto;
			}
			#wrapper.active{
				padding-left: 150px;
			}
			#wrapper.active #sidebar-wrapper{
				left :150px;
			}
			#page-content-wrapper{
				width: 100%;
			}
			#sidebar_menu li a, .sidebar-nav li a{
				color: purple;
				display: block;
				float: left;
				text-decoration: none;
				width: 150px;
				background: #fff;
				-webkit-transition: background .5s;
				-moz-transition:background .5s;
				-o-transition:background .5s;
				-ms-transition:background .5s;
				transition: background .5s; 
			}
			.sidebar_name{
				padding-top: 25px;
				color: #fff;
				opacity: .7;
			}
			.sidebar-nav li {
				line-height: 40px;
				text-indent: 20px;
			}
			.sidebar-nav li a{
				color:grey;
				display: block;
				text-decoration: none;
			}
			.sidebar-nav li a:hover{
				color:#fff;
				background: rgba(255,255,255,0.2);
				text-decoration: none;
			}
			.sidebar-nav li a:active,
			.sidebar-nav li a:focus{
				text-decoration: none;
			}
			.sidebar-nav > .sidebar-brand{
				height: 55px;
				line-height:50px;
				font-size: 18px;
			}
			.sidebar-nav > .sidebar-brand a {
				color: #999999;
			}
			.sidebar-nav > .sidebar-brand a:hover{
				color: #fff;
				background: none;
			}
			#main_icon {
				float: right;
				padding-right: 55px;
				padding-top: 20px;
			}
			.sub_icon{
				float: right;
				padding-top: 10px;
				padding-right: 65px;
			}
			.content-header{
				height: 55px;
				line-height: 55px;
			}
			.content-header h1 {
				margin: 0;
				margin-left: 20px;
				line-height: 65px;
				display: inline-block;
			}

			@media(max-width: 767px){
				#wrapper{
					padding-left: 60px;
					transition: all .3s ease 0s;
				}
				#sidebar-wrapper{
					left:70px;
				}
				#wrapper.active{
					padding-left: 150px;
				}
				#wrapper.active #sidebar-wrapper{
					left: 150px;
					width: 150px;
					transition: all .3s ease 0s;
				}
			}
		</style>
			
	</head>

	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: url(./assets/img/footer.jpg)">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
					</button>
					<a class="navbar-brand" href="index.php"><?php 
					// Jika nama sistem lebih besar dari 10 karakter
					if (strlen($setting_sistem["nama_sistem"])>10) {
						$nama_baru = "";
						if (strpos($setting_sistem["nama_sistem"], " ")!==FALSE) {
							$ex_nama_sistem = explode(" ", $setting_sistem["nama_sistem"]);
							for ($i=0; $i < count($ex_nama_sistem); $i++) { 
								$nama_baru .= ucwords(substr($ex_nama_sistem[$i], 0, 1));
							}
						}
						echo $nama_baru;
					}
					else {
						echo $setting_sistem["nama_sistem"];
					}
					?></a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<!-- <li class="active"><a href="index.php">Beranda</a></li>
						<?php 
						// Menu ditampilkan hanya jika user login
						if (sudah_login()) {
							echo '<li><a href="anggota.php">Data Alumni</a></li>';
						}

						// Menu berdasarkan hak akses
						if (isset($_SESSION["a2_hak_akses"]) && $_SESSION["a2_hak_akses"]!=""){
							$array_menu = tampil_menu("biasa", $_SESSION["a2_hak_akses"]);
							$menu_utama = "";
							foreach ($array_menu as $data_menu) {
								$menu_utama .= "<li><a href='$data_menu[halaman_modul]'>$data_menu[nama_modul]</a></li>";
							}
							echo $menu_utama;
						}
						?> -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if (sudah_login()): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fui-gear"></i> <i class="caret"></i></a>
								<ul class="dropdown-menu">
									<li><a class="disabled"><?php echo $_SESSION["a2_nama_depan"]." ".$_SESSION["a2_nama_belakang"] ?></a></li>
									<?php 
									if ($_SESSION["a2_level"] == "super_user"){
										$array_menu_user = tampil_menu("sistem", "*");
										$menu_user       = "";
										foreach ($array_menu_user as $data_menu_user) {
											$menu_user .= "<li><a href='$data_menu_user[halaman_modul]'>$data_menu_user[nama_modul]</a></li>";
										}
										echo $menu_user;
									}
									?>
									<li class="divider"></li>
									<li><a href="profil.php"><i class="fui-user"></i> Profil</a></li>
									<li><a href="logout.php" onclick="return confirm('Keluar dari sistem <?php echo $setting_sistem["nama_sistem"] ?>?')"><i class="fui-exit"></i> Logout</a></li>
				                
								</ul>
							</li>
						<?php else: ?>
							<li><a href="login.php">Login</a></li>
						<?php endif ?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<?php 
		// Menu ditampilkan hanya jika user login
		if (sudah_login()) {
							
		?>
			<div id="wrapper" class="active">
				<div id="sidebar-wrapper">
					<ul id="sidebar_menu" class="sidebar-nav">
						<li class="sidebar-brand">
							<a id="menu-toggle" href="#">Menu<span class="glyphicon glyphicon-align-justify" style="padding-left: 30px"></span>
							</a></li>
					</ul>

					<ul class="sidebar-nav" id="sidebar" style="font-size: 10pt">
						<li><a href="anggota.php">Data Alumni</a></li></span></a></li>
						<?php
							
						}

						// Menu berdasarkan hak akses
						if (isset($_SESSION["a2_hak_akses"]) && $_SESSION["a2_hak_akses"]!=""){
							$array_menu = tampil_menu("biasa", $_SESSION["a2_hak_akses"]);
							$menu_utama = "";
							foreach ($array_menu as $data_menu) {
								$menu_utama .= "<li><a href='$data_menu[halaman_modul]'>$data_menu[nama_modul]</a></li>";
							}
							echo $menu_utama;
						}
						?>
					</ul>
				</div>
		
		