<?php
require_once("../config/conexion.php");
require_once("../models/Marca.php");


$marca = new Marca();

switch ($_GET("op")) {

    case 'guardar':
         $marca->insert_marca($_POST["mrc_nombre"]);
        break;

    case 'editar':
        $marca->update_marca($_POST["mrc_id"], $_POST["mrc_nombre"]);
        break;
    
    case 'listar':
          $datos = $marca->get_marca();
            $data = Array();

            /*TODO:Realizamos un Barrido a todos los reg de Marca y los Almacenamos en un Array $ub_array */
           foreach($datos as $row){
            $sub_array = array();
            $sub_array []= $row["mrc_nombre"];
            $sub_array[] = $row["fech_reg"]; 
            $sub_array[] = '<button type="button" onClick="editar('.$row["mrc_id"].')" id="'.$row["mrc_id"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["mrc_id"].')" id="'.$row["mrc_id"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';  
            $data[] = $sub_array;
                
            }   

            /* TODO:Parametros necesario para enviar el total de registros de la consulta almacenada en $data y pasarlo al DataTable */
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
        break;

    case 'mostrar':

         /* TODO:Alamcenamos la resultante de esta consulta en una variable $datos y asi envialo como un JSON */
         $datos = $marca->get_marca_id($_POST["mrc_id"]);

         /*TODO: Verificamos si es un Array y los datos son mayor a cero */
        if(is_array($datos)==true and count($datos)>0){
            /* TODO:Aplicamos un forearch asignando cada campo recibido de la db a una valor $output */
            foreach($datos as $row){
                $output["mrc_id"] = $row["mrc_id"];
                $output["mrc_nombre"] = $row["mrc_nombre"];
            }
            /* TODO:Codificamos el resultado en un JSON y asi pasarlo a la vista Marca */
            echo json_encode($output);
        }
        
        break;

    case 'eliminar':
        $marca->delete_marca($_POST["mrc_id"]);
        break;

    
}



?>