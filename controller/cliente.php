<?php
require_once("../config/conexion.php");
require_once("../models/Cliente.php");
$cliente = new Cliente();

switch ($_GET["op"]) {

    case 'guardaryeditar':
        if(empty($_POST["cli_id"])){
            $cliente->insert_cliente(
            $_POST["tpc_id"], 
            $_POST["cli_rut"], 
            $_POST["cli_nombre"], 
            $_POST["cli_direccion"], 
            $_POST["cli_telefono"], 
            $_POST["cli_correo"], 
            $_POST["cli_coordinador"], 
            $_POST["precio"], 
            $_POST["cli_img"]
          );
         }else{  
           $cliente->update_cliente(
            $_POST["cli_id"], 
            $_POST["tpc_id"], 
            $_POST["cli_rut"], 
            $_POST["cli_nombre"], 
            $_POST["cli_direccion"], 
            $_POST["cli_telefono"], 
            $_POST["cli_correo"], 
            $_POST["cli_coordinador"], 
            $_POST["precio"], 
            $_POST["cli_img"]
           );
         }
    break;


    case 'listar':
          $datos = $cliente->get_clientes();
            $data = Array();

            /*TODO:Realizamos un Barrido a todos los reg de Cliente y los Almacenamos en un Array $ub_array */
           foreach($datos as $row){
            $sub_array = array();

            if ($row["cli_img"] != ''){
                $sub_array[] =
                "<div class='d-flex align-items-center'>" .
                    "<div class='flex-shrink-0 me-2'>".
                        "<img src='../../assets/images/clients/".$row["cli_img"]."' alt='' class='avatar-xs rounded-circle'>".
                    "</div>".
                "</div>";
            }else{
                $sub_array[] =
                "<div class='d-flex align-items-center'>" .
                    "<div class='flex-shrink-0 me-2'>".
                        "<img src='../../assets/images/clients/not_photo.jpg' alt='' class='avatar-xs rounded-circle'>".
                    "</div>".
                "</div>"; 
            }


          /*   $sub_array []= $row["cli_id"]; */
            $sub_array []= $row["cli_rut"];
            $sub_array []= $row["cli_nombre"];
            $sub_array []= $row["tpc_nombre"];
            /* $sub_array []= $row["cli_direccion"]; */
            $sub_array []= $row["cli_correo"];
            $sub_array []= $row["cli_telefono"];
            $sub_array []= $row["cli_coordinador"];
          /*   $sub_array[] = date("d/m/Y", strtotime($row["fech_reg"])); */
            $sub_array[] = '<button type="button" onClick="editar('.$row["cli_id"].')" id="'.$row["cli_id"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class="fa fa-wrench"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["cli_id"].')" id="'.$row["cli_id"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="far fa-trash-alt"></i></button>';  
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
         $datos = $cliente->get_cliente_id($_POST["cli_id"]);

         /*TODO: Verificamos si es un Array y los datos son mayor a cero */
        if(is_array($datos)==true and count($datos)>0){
            /* TODO:Aplicamos un forearch asignando cada campo recibido de la db a una valor $output */
            foreach($datos as $row){
                $output["cli_id"] = $row["cli_id"];
                $output["cli_rut"] = $row["cli_rut"];
                $output["cli_nombre"] = $row["cli_nombre"];
                $output["tpc_id"] = $row["tpc_id"];
                $output["cli_direccion"] = $row["cli_direccion"];
                $output["cli_coordinador"] = $row["cli_coordinador"];
                $output["cli_telefono"] = $row["cli_telefono"];
                $output["cli_correo"] = $row["cli_correo"];
                $output["precio"] = $row["precio"];
                $output["cli_img"] = $row["cli_img"];
                $output["fech_reg"] = $row["fech_reg"];

                if($row["cli_img"] !=''){
                    $output["cli_img"] = '<img src="../../assets/images/clients/'.$row["cli_img"].'"class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_cliente_imagen" value="'.$row["cli_img"].'" />';
                }else{
                    $output["cli_img"] = '<img src="../../assets/images/clients/not_photo.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_cliente_imagen" value="" />';
                } 
                
            }
            /* TODO:Codificamos el resultado en un JSON y asi pasarlo a la vista Cliente */
            echo json_encode($output);
        }
        
    break;

    case 'eliminar':
        $cliente->delete_cliente($_POST["cli_id"]);
    break;


      /* TODO: Listado de tipos de clientes */
    case "combo";
             $datos=$cliente->get_tipo_cliente();
            if(is_array($datos)==true and count($datos)>0){
            $html="";
            $html.="<option selected>Seleccionar</option>";
         foreach($datos as $row){
                $html.= "<option value='".$row["tpc_id"]."'>".$row["tpc_nombre"]."</option>";
            }
            echo $html;
        }
    break;

    
}



?>