
<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {

	

?>


<!DOCTYPE html>
<html lang="es">
<?php require_once("../html/head.php");?>

	<body class="main-body app sidebar-mini ltr">

		<!-- Loader -->
		<!-- <div id="global-loader">
			<img src="../../assets/img/svgicons/loader.svg" class="loader-img" alt="Loader">
		</div>  -->
		<!-- /Loader -->

				<!-- main-header -->
				<?php require_once("../html/header.php");?>
				<!-- main-header -->

				<!-- main-sidebar -->
			    <?php require_once("../html/menu.php");?>
			    <!-- main-sidebar -->

	<!-- main-content-principal -->
	<div class="main-content app-content">

		<!-- container principal -->
		<div class="main-container container-fluid">

		 <!-- NAME SESSION -->
		 <div class="breadcrumb-header justify-content-between">
			<div class="left-content">
				<div>
					<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Usuarios</h2>
					<p class="mg-b-0">Marco Yanez - Soporte</p>
				</div>
			</div>
			<div class="main-dashboard-header-right">
				<div>
					
				</div>
				<div>
					
				</div>
				<div>
				</div>
			</div>
        </div>            
    <!-- END NAME SESSION -->

						
        <!-- STAR DATA-TABLE -->

                    <div class="card">
						<div class="card-header">
							<button type="button" id="btnNuevo" class="btn btn-success" >Nuevo</button>
						</div>
                        <div class="card-body">
                            <div class="table-responsive" id="table">               
                                    <table id="tpcliente_data" class="table table-bordered text-nowrap border-bottom table-vcenter js-dataTable-full">
                                        <thead>
                                            <tr>
                                            <th style="width: 10%;">id</th>
                                            <th style="width: 50%;">Nombre</th>
                                            <th style="width: 10%;">pago</th>
                                            <th class="text-center" style="width: 5%;">Editar</th>
                                            <th class="text-center" style="width: 5%;">Eliminar</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        
                                    </tbody>         
                            </div>
                        </div>  
                    </div>    <!-- End card -->                                                                                                         
        <!-- END DATA-TABLE -->	
     
		<?php require_once("./Modal.php"); ?>
						
		</div><!-- /main-content -->

		
	</div>
	<!-- End main-content-principal -->
	

	
	<!-- Footer opened -->
	<!-- -->
	<!-- Footer closed -->
	
	
	
	<!-- Scripts opened -->
	<?php require_once("../html/js.php");?>

	<script type="text/javascript" src="mdtpcliente.js"></script>
	<!-- Scripts closed -->
	

	</body>
</html>

<?php
} else {
	header("location:" . Conectar::ruta() . "index.php");
}
?>