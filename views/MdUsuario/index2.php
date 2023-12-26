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
        <div class="card-body">
            <div class="table-responsive" id="table">               
                    <table id="usu_data" class="table table-bordered text-nowrap border-bottom table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="wd-20p">Reg</th>
                                <th class="wd-25p">Nombre</th>
                                <th class="wd-20p">Apellido</th>
                                <th class="wd-15p">Correo</th>
                                <th class="wd-20p">Perfil</th>
                                <th class="wd-20p">Fecha</th>
                                <th class="wd-20p">Acciones</th>
                            </tr>
                        </thead>
                    <tbody>
                        
                    </tbody>         
            </div>
          </div>  
       </div>    <!-- End card -->
     </div>   <!-- /Container -->                                                        
   </div>  <!-- /Content page -->                                                                                                           
<!-- END DATA-TABLE -->	

  <?php require_once("../html/footer.php");?> 
  <?php require_once("../html/js.php");?>
  
  
  <!-- DATA TABLE JS -->
  <script src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="../../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
  <script src="../../assets/plugins/datatable/js/dataTables.buttons.min.js"></script> 
  <script src="../../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script> 
  <script src="../../assets/plugins/datatable/js/jszip.min.js"></script>
  <script src="../../assets/plugins/datatable/dataTables.responsive.min.js"></script>
  <script src="../../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
  <script src="../../assets/js/table-data.js"></script>  
  <script type="text/javascript" src="mdusuario.js"></script>
  </body>
</html>