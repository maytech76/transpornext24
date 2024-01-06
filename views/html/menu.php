   

<!---------------------->
<!-- MENU SIDEBAR IZQ -->
<!---------------------->
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="sticky">
                <aside class="app-sidebar sidebar-scroll">
                    <div class="main-sidebar-header active">
                        <a class="desktop-logo logo-light active" href="index.html"><img src="../../assets/img/brand/logo.png" class="main-logo" alt="logo"></a>
                        <a class="desktop-logo logo-dark active" href="index.html"><img src="../../assets/img/brand/logo-white.png" class="main-logo" alt="logo"></a>
                        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="../../assets/img/brand/favicon.png" alt="logo"></a>
                        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="../../assets/img/brand/favicon-white.png" alt="logo"></a>
                    </div>
                    <div class="main-sidemenu">
                        <div class="app-sidebar__user clearfix">
                            <div class="dropdown user-pro-body">
                                <div class="main-img-user avatar-xl">
                                    <!-- photo avatar sidebar -->
                                    <img alt="user-img" src="../../assets/images/users/<?php echo $_SESSION["usu_img"]?>"><span class="avatar-status profile-status bg-green"></span>
                                </div>
                                <div class="user-info">
                                    <h4 class="fw-semibold mt-3 mb-0"><?php echo $_SESSION["usu_nombre"]?></h4>
                                    <span class="mb-0 text-muted"><?php echo $_SESSION["tpuse_nombre"]?></span>
                                </div>
                            </div>
                        </div>
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                        <ul class="side-menu">

                            <?php 
                               if ($_SESSION["tipo_id"]==2) {
                               ?>

                                <div class="cliente">
                                    <li class="side-item side-item-category" style="color: yellowgreen;">cliente</li>

                                        <li class="slide">
                                            <a class="side-menu__item" href="#"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Profesional</span></a>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" href="#"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Orden de Traslado</span></a>
                                        </li>

                                        <li class="slide">
                                            <a class="side-menu__item" href="#"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Reportes</span></a>
                                        </li>
                                </div>

                            <?php
                             }else if ($_SESSION["tipo_id"]==3) { ?>
                                <br>

                                <div class="chofer">
                                    <li class="side-item side-item-category" style="color:darkorange;">Chofer</li>
    
                                        <li class="slide">
                                            <a class="side-menu__item" href="#"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Traslado</span></a>
                                        </li>
    
                                        <li class="slide">
                                            <a class="side-menu__item" href="#"><i class="fe fe-package mx-2"></i><span class="side-menu__label">List Traslados</span></a>
                                        </li>
    
                                        <li class="slide">
                                            <a class="side-menu__item" href="#"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Reportes</span></a>
                                        </li>
    
                                        <li class="slide">
                                            <a class="side-menu__item" href="#"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Viaticos</span></a>
                                        </li>
                                </div>
                            

                            <?php
                                }else if ($_SESSION["tipo_id"]==1) { ?>
                                

                            <br>

                            <div class="admin" style="margin-bottom: 30px;">
                                <li class="side-item side-item-category" style="color: aqua;">Administrativo</li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="../MdUsuario/"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Usuarios</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="empresa.php"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Empresa</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="../MdtpCliente/"><i class="fe fe-package mx-2"></i><span class="side-menu__label"> Tipo Clientes</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="../MdCliente/"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Clientes</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="vehiculo"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Vehiculos</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="chofer"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Choferes</span></a>
                                    </li>
                                    
                                    <li class="slide">
                                        <a class="side-menu__item" href="traslados.php"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Traslados</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="ordentraslado.php"><i class="fe fe-package mx-2"></i><span class="side-menu__label">List Traslados</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="report1.php"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Reportes</span></a>
                                    </li>

                                    <li class="slide">
                                        <a class="side-menu__item" href="Viaticos.php"><i class="fe fe-package mx-2"></i><span class="side-menu__label">Viaticos</span></a>
                                    </li>
                            </div>

                            <?php

                            }

                            ?>

                        
                        </ul>


                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </aside>
            </div>
            <!-- main-sidebar -->
        </div>


       

                