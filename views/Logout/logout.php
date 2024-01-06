<?php
    require_once("../../config/conexion.php");
    session_destroy();
    header("location:".ConectarSql::ruta()."index.php");
    exit();

?>