<!DOCTYPE html>
<html lang="es">

    <?php require_once("../htm/head.php");?>

    <!-- STAR HEADER-SIDEBAR -->	
    <div>
    
    <?php require_once("../htm/header.php");?>
    <?php require_once("../htm/sidebar.php");?>

    </div>
    <!-- END HEADER-SIDEBAR -->


<!-- main-content-principal -->
<div class="main-content app-content">

    <!-- container -->
    <div class="main-container container-fluid">

        <!-- STAR DATA-TABLE -->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive" id="table">               
                        <table id="data" class="table table-bordered text-nowrap border-bottom table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                <th style="width: 10%;">Correo</th>
                                <th style="width: 5%;">Password</th>
                                <th style="width: 2%;">Rol id</th>
                                <th style="width: 5%;">Perfil</th>
                                <th style="width: 10%;">Fecha</th>
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

    </div>
    <!-- End container -->

<!-- Footer opened -->
<?php require_once("../htm/footer.php");?>
<!-- Footer closed -->

    
</div>
<!--end main content-->

    


    <!-- Scripts opened -->
    <?php require_once("../htm/script.php");?>
</body>
</html>