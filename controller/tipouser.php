<?php
require_once("../config/conexion.php");
require_once("../models/Tipouser.php");
$tipouser = new Tipouser();

switch ($_GET["op"]) {

    case 'guardar':
         $tipouser->insert_user($_POST["tipo_id"], 
                               $_POST["tpuse_telefono"], 
                               $_POST["tpuse_correo"], 
                               $_POST["tpuse_nombre"], 
                               $_POST["tpuse_apellido"], 
                               $_POST["tpuse_contacto"], 
                               $_POST["cont_telefono"], 
                               $_POST["tpuse_pass"],
                               $_POST["tpuse_img"]);
    break;

    case 'editar':
        $tipouser->update_tipouser($_POST["tpuse_id"], $_POST["tpuse_nombre"]);
    break;
    


    case 'listar':
          $datos = $tipouser->get_tipousers();
            $data = Array();

            /*TODO:Realizamos un Barrido a todos los reg de Tipouser y los Almacenamos en un Array $ub_array */
           foreach($datos as $row){
            $sub_array = array();
            $sub_array []= $row["tpuse_id"];
            $sub_array []= $row["tpuse_nombre"];
            $sub_array []= $row["tpuse_apellido"];
            $sub_array []= $row["tpuse_correo"];
            $sub_array []= $row["tpuse_nombre"];
            $sub_array[] = date("d/m/Y", strtotime($row["fech_reg"]));
            $sub_array[] = '<button type="button" onClick="editar('.$row["tpuse_id"].')" id="'.$row["tpuse_id"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class="fa fa-wrench"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["tpuse_id"].')" id="'.$row["tpuse_id"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="far fa-trash-alt"></i></button>';  
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
         $datos = $tipouser->get_tipouser_id($_POST["tpuse_id"]);

         /*TODO: Verificamos si es un Array y los datos son mayor a cero */
        if(is_array($datos)==true and count($datos)>0){
            /* TODO:Aplicamos un forearch asignando cada campo recibido de la db a una valor $output */
            foreach($datos as $row){
                $output["tpuse_id"] = $row["tpuse_id"];
                $output["tpuse_nombre"] = $row["tpuse_nombre"];
            }
            /* TODO:Codificamos el resultado en un JSON y asi pasarlo a la vista Tipouser */
            echo json_encode($output);
        }
        
    break;

    case 'eliminar':
        $tipouser->delete_tipouser($_POST["tpuse_id"]);
    break;

      /* TODO: Listado de Productos */
    case "combo";
            $datos=$tipouser->get_tipo_user();
            if(is_array($datos)==true and count($datos)>0){
            $html="";
            $html.="<option selected>Seleccionar</option>";
         foreach($datos as $row){
                $html.= "<option value='".$row["tpuse_id"]."'>".$row["tpuse_nombre"]."</option>";
            }
            echo $html;
        }
    break;

    
}



?>