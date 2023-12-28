<?php
require_once("../config/conexion.php");
require_once("../models/TpCliente.php");
$tpcliente = new TpCliente();

switch ($_GET["op"]) {


    case 'guardaryeditar':
        if(empty($_POST["tpc_id"])){
            $tpcliente->insert_tpcliente(
            $_POST["tpc_nombre"],
            $_POST["valor"]
          );
         }else{  
           $tpcliente->update_tp_cliente(
            $_POST["tpc_id"], 
            $_POST["tpc_nombre"], 
            $_POST["valor"] 
           
           );
         }
    break;


    case 'listar':
          $datos = $tpcliente->get_tpclientes();
            $data = Array();

              /*TODO:Realizamos un Barrido a todos los reg de Tipouser y los Almacenamos en un Array $ub_array */
           foreach($datos as $row){
            $sub_array = array();
            $sub_array []= $row["tpc_id"];
            $sub_array []= $row["tpc_nombre"];
            $sub_array []= $row["valor"];
            $sub_array[] = '<button type="button" onClick="editar('.$row["tpc_id"].')" id="'.$row["tpc_id"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class="fa fa-wrench"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["tpc_id"].')" id="'.$row["tpc_id"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="far fa-trash-alt"></i></button>';  
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
         $datos = $tpcliente->get_tpcliente_id($_POST["tpc_id"]);

         /*TODO: Verificamos si es un Array y los datos son mayor a cero */
        if(is_array($datos)==true and count($datos)>0){
            /* TODO:Aplicamos un forearch asignando cada campo recibido de la db a una valor $output */
            foreach($datos as $row){
                $output["tpc_id"] = $row["tpc_id"];
                $output["tpc_nombre"] = $row["tpc_nombre"];
                $output["valor"] = $row["valor"];
                
            }
            /* TODO:Codificamos el resultado en un JSON y asi pasarlo a la vista TpCliente */
            echo json_encode($output);
        }
        
    break;


    case 'eliminar':
        $tpcliente->delete_tpcliente($_POST["tpc_id"]);
    break;


      /* TODO: Listado de Productos */
    case "combo";
             $datos=$tpcliente->get_tpclientes();
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