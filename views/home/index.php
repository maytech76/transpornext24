
<!DOCTYPE html>
<html lang="es">
  <?php require_once("../html/head.php");?>
</head>
<?php require_once("../html/header.php");?>

<body class="main-body app sidebar-mini ltr">   
  <?php require_once("../html/menu.php");?>

<!---------------------------->
<!----- STAR MAIN-CONTENT ---->
<!---------------------------->
<div class="main-content app-content">
<!-- container -->
  <div class="main-container container-fluid">

    <!-- NAME SESSION -->
        <div class="breadcrumb-header justify-content-between">
			<div class="left-content">
				<div>
					<h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">DashBoard</h2>
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
   

  				    <!-- row -->
                    <div class="row row-sm my-5">
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-primary-gradient">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">ORDEN SOLICITADA</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white">3</h4>
												<p class="mb-0 tx-12 text-white op-7">traslado semanal</p>
											</div>
											<span class="float-end my-auto ms-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> +1</span>
											</span>
										</div>
									</div>
								</div>
								<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-danger-gradient">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">ORDEN EN PROCESO</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white">1</h4>
												<p class="mb-0 tx-12 text-white op-7">traslado semanal</p>
											</div>
											<span class="float-end my-auto ms-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> 1</span>
											</span>
										</div>
									</div>
								</div>
								<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-success-gradient">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">ORDENES EFECTUDAS</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white">8</h4>
												<p class="mb-0 tx-12 text-white op-7">traslado semanal</p>
											</div>
											<span class="float-end my-auto ms-auto">
												<i class="fas fa-arrow-circle-up text-white"></i>
												<span class="text-white op-7"> 7</span>
											</span>
										</div>
									</div>
								</div>
								<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
							<div class="card overflow-hidden sales-card bg-warning-gradient">
								<div class="px-3 pt-3  pb-2 pt-0">
									<div class="">
										<h6 class="mb-3 tx-12 text-white">VEHICULOS ACTIVOS</h6>
									</div>
									<div class="pb-0 mt-0">
										<div class="d-flex">
											<div class="">
												<h4 class="tx-20 fw-bold mb-1 text-white">6</h4>
												 <p class="mb-0 tx-12 text-white op-7">Gestión de Mantenimiento</p>
											</div>
											<span class="float-end my-auto ms-auto">
												<i class="fas fa-arrow-circle text-white"></i>
												<!-- <span class="text-white op-7"> -152.3</span> -->
											</span>
										</div>
									</div>
								</div>
								<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
							</div>
						</div>
					</div>
					<!-- row closed -->

                    <div class="row row-sm">
						<div class="col-md-12 col-lg-12 col-xl-6">
							<div class="card">
								<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mb-0">ESTADISTICAS DE TRASLADOS</h4>
										<a href="javascript:void(0);" class="tx-inverse" data-bs-toggle="dropdown"><i
											class="mdi mdi-dots-horizontal text-gray"></i></a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="javascript:void(0);">Action</a>
											<a class="dropdown-item" href="javascript:void(0);">Another
												Action</a>
											<a class="dropdown-item" href="javascript:void(0);">Something Else
												Here</a>
										</div>
									</div>
									<p class="tx-12 text-muted mb-0">Calculo realizado en base a los traslados del mes pasado</p>
								</div>
								<div class="card-body b-p-apex">
									<div class="total-revenue">
										<div>
										  <h4>120</h4>
										  <label><span class="bg-primary"></span>solicitada</label>
										</div>
										<div>
										  <h4>0</h4>
										  <label><span class="bg-danger"></span>Pendientes</label>
										</div>
										<div>
										  <h4>32,895</h4>
										  <label><span class="bg-warning"></span>Efectudas</label>
										</div>
									  </div>
									<div id="bar" class="sales-bar mt-4"></div>
								</div>
							</div>
						</div>

                        <div class="col-xl-6 col-md-12 col-lg-6">
							<div class="card">
								<div class="card-header pb-1">
									<h3 class="card-title mb-2">Actividades recientes</h3>
									<p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve their goals and objective</p>
								</div>
								<div class="product-timeline card-body pt-2 mt-1">
									<ul class="timeline-1 mb-0">
										<li class="mt-0 mrg-8"> <i class="ti-pie-chart bg-primary-gradient text-white product-icon"></i> <span class="fw-semibold mb-4 tx-14 ">Total Products</span> <a href="javascript:void(0);" class="float-end tx-11 text-muted">3 days ago</a>
											<p class="mb-0 text-muted tx-12">1.3k New Products</p>
										</li>
										<li class="mt-0 mrg-8"> <i class="mdi mdi-cart-outline bg-danger-gradient text-white product-icon"></i> <span class="fw-semibold mb-4 tx-14 ">Total Sales</span> <a href="javascript:void(0);" class="float-end tx-11 text-muted">35 mins ago</a>
											<p class="mb-0 text-muted tx-12">1k New Sales</p>
										</li>
										<li class="mt-0 mrg-8"> <i class="ti-bar-chart-alt bg-success-gradient text-white product-icon"></i> <span class="fw-semibold mb-4 tx-14 ">Toatal Revenue</span> <a href="javascript:void(0);" class="float-end tx-11 text-muted">50 mins ago</a>
											<p class="mb-0 text-muted tx-12">23.5K New Revenue</p>
										</li>
										<li class="mt-0 mrg-8"> <i class="ti-wallet bg-warning-gradient text-white product-icon"></i> <span class="fw-semibold mb-4 tx-14 ">Toatal Profit</span> <a href="javascript:void(0);" class="float-end tx-11 text-muted">1 hour ago</a>
											<p class="mb-0 text-muted tx-12">3k New profit</p>
										</li>
										<li class="mt-0 mrg-8"> <i class="si si-eye bg-purple-gradient text-white product-icon"></i> <span class="fw-semibold mb-4 tx-14 ">Customer Visits</span> <a href="javascript:void(0);" class="float-end tx-11 text-muted">1 day ago</a>
											<p class="mb-0 text-muted tx-12">15% increased</p>
										</li>
										<li class="mt-0 mb-0 mrg-8"> <i class="icon-note icons bg-primary-gradient text-white product-icon"></i> <span class="fw-semibold mb-4 tx-14 ">Customer Reviews</span> <a href="javascript:void(0);" class="float-end tx-11 text-muted">1 day ago</a>
											<p class="mb-0 text-muted tx-12">1.5k reviews</p>
										</li>
									</ul>
								</div>
							</div>
						 </div>
						
					</div>
					<!-- row closed -->
  </div> <!-- End Container -->
</div> <!-- End content -->

  <?php require_once("../html/footer.php");?>
  <?php require_once("../html/js.php");?>

</body>
</html>