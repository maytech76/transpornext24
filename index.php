<?php

	require_once("config/conexion.php");

	if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
		require_once("models/Usuario.php");
		$usuario = new Usuario();
		$usuario->login();
	}

?>

<!DOCTYPE html>
<html lang="es">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4">

		<!-- Title -->
		<title> Login </title>

		<!--- Favicon -->
		<link rel="icon" href="assets/img/brand/favicon.png" type="image/x-icon">

		<!--- Icons css -->
		<link href="assets/css/icons.css" rel="stylesheet">

		<!-- Bootstrap css -->
		<link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- style css -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/plugins.css" rel="stylesheet">

		<!--- Animations css -->
		<link href="assets/css/animate.css" rel="stylesheet">

	</head>
	<body class="ltr error-page1 main-body error-3 login-img">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/svgicons/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page overflow-hidden">


			<div class="container-fluid">
				<div class="row">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-6 d-flex align-items-stretch p-0">
						<img src="assets/img/backgrounds/login.jpg" class="w-100" alt="Portada">
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-6 bg-white py-4">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">

									<!-- imagen de la empresa -->
										<div class="mb-5 d-flex">
											<a href="index.html"><img src="assets/img/brand/favicon.png"
													class="sign-favicon-a ht-40" alt="logo">
												<img src="assets/img/brand/favicon-white.png"
													class="sign-favicon-b ht-40" alt="logo">
											</a>
											<h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Autosol<span> Spa</span></h1>
										</div>
									<!-- end imagen de la empresa -->
										<div class="main-signup-header">
											<h2 class="text-primary">Bienvenido</h2>
											<h5 class="fw-normal mb-4">Insertar Credenciales</h5>

											<form action="" method="POST" id="login_form">

											<?php

													if (isset($_GET["m"])) {
														switch ($_GET["m"]) {
															case "1":
															?>

																<div class="alert alert-warning alert-dismissible fade show" role="alert">
																	<span class="alert-inner--icon"><i class="fe fe-info text-dark"></i></span>
																	<span class="alert-inner--text"><stron class="text-dark">Error! - El Usuario y/ó Contraseña son Incorrectos</stron ></span>
																	<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>

															<?php
																break;

															case "2";
															?>

																<div class="alert alert-danger alert-dismissible fade show" role="alert">
																	<span class="alert-inner--icon"><i class="fe fe-info text-dark"></i></span>
																	<span class="alert-inner--text"><stron class="text-dark">Error! - Existen Campos Vacios, Verificar</stron ></span>
																	<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
																</div>

															<?php
																break;
														}
													}

													?>
												
												<div class="form-group">
													<label>Email</label> <input id="usu_correo" name="usu_correo" class="form-control" placeholder="Ingresar email" type="text">
												</div>
												<div class="form-group">
													<label>Password</label> <input id="usu_pass" name="usu_pass" class="form-control" placeholder="Ingresar  password" type="password">
												</div>
												<input type="hidden" name="enviar" value ="si">
												<!-- <a href="index.html"  class="btn btn-main-primary btn-block">Acceder</a> -->
												<button class="btn btn-main-primary btn-block" type="submit">Acceder</button>
												
											</form>
											<!-- <div class="main-signup-footer mt-5">
												<p>Already have an account? <a href="signin.html">Sign In</a></p>
											</div> -->
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		

		</div>
		<!-- End Page -->

		<!--- JQuery min js -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!--- Bootstrap Bundle js -->
		<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--- JQuery sparkline js -->
		<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!--- Moment js -->
		<script src="assets/plugins/moment/moment.js"></script>

		<!-- P-scroll js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!--- Eva-icons js -->
		<script src="assets/js/eva-icons.min.js"></script>

		<!--themecolor js-->
		<script src="assets/js/themecolor.js"></script>

		<!--- Custom js -->
		<script src="assets/js/custom.js"></script>

		<!-- switcher-styles js -->
		<script src="assets/js/swither-styles.js"></script>

	</body>
</html>