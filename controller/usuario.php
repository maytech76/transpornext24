<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
$usuario = new Usuario();

switch ($_GET["op"]) {

    case 'guardaryeditar':
        if(empty($_POST["usu_id"])){
            $usuario->insert_user(
            $_POST["tipo_id"], 
            $_POST["usu_telefono"], 
            $_POST["usu_correo"], 
            $_POST["usu_nombre"], 
            $_POST["usu_apellido"], 
            $_POST["usu_contacto"], 
            $_POST["cont_telefono"], 
            $_POST["usu_pass"],
            $_POST["usu_img"]
          );
         }else{  
           $usuario->update_usuario(
            $_POST["usu_id"], 
            $_POST["tipo_id"], 
            $_POST["usu_telefono"], 
            $_POST["usu_correo"], 
            $_POST["usu_nombre"], 
            $_POST["usu_apellido"], 
            $_POST["usu_contacto"], 
            $_POST["cont_telefono"], 
            $_POST["usu_pass"],
            $_POST["usu_img"]
           );
         }
    break;



    case 'listar':
          $datos = $usuario->get_usuarios();
            $data = Array();

            /*TODO:Realizamos un Barrido a todos los reg de Usuario y los Almacenamos en un Array $ub_array */
           foreach($datos as $row){
            $sub_array = array();

            if ($row["usu_img"] != ''){
                $sub_array[] =
                "<div class='d-flex align-items-center'>" .
                    "<div class='flex-shrink-0 me-2'>".
                        "<img src='../../assets/images/users/".$row["usu_img"]."' alt='' class='avatar-xs rounded-circle'>".
                    "</div>".
                "</div>";
            }else{
                $sub_array[] =
                "<div class='d-flex align-items-center'>" .
                    "<div class='flex-shrink-0 me-2'>".
                        "<img src='../../assets/images/users/not_photo.jpg' alt='' class='avatar-xs rounded-circle'>".
                    "</div>".
                "</div>"; 
            }


          /*   $sub_array []= $row["usu_id"]; */
            $sub_array []= $row["usu_nombre"];
            $sub_array []= $row["usu_apellido"];
            $sub_array []= $row["tpuse_nombre"];
            $sub_array []= $row["usu_correo"];
            $sub_array []= $row["usu_telefono"];
            $sub_array[] = date("d/m/Y", strtotime($row["fech_reg"]));
            $sub_array[] = '<button type="button" onClick="editar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class="fa fa-wrench"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="far fa-trash-alt"></i></button>';  
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
         $datos = $usuario->get_usuario_id($_POST["usu_id"]);

         /*TODO: Verificamos si es un Array y los datos son mayor a cero */
        if(is_array($datos)==true and count($datos)>0){
            /* TODO:Aplicamos un forearch asignando cada campo recibido de la db a una valor $output */
            foreach($datos as $row){
                $output["usu_id"] = $row["usu_id"];
                $output["usu_nombre"] = $row["usu_nombre"];
                $output["usu_apellido"] = $row["usu_apellido"];
                $output["tipo_id"] = $row["tpuse_id"];
                $output["usu_contacto"] = $row["usu_contacto"];
                $output["cont_telefono"] = $row["cont_telefono"];
                $output["usu_pass"] = $row["usu_pass"];
                $output["usu_correo"] = $row["usu_correo"];
                $output["usu_telefono"] = $row["usu_telefono"];
                $output["fech_reg"] = $row["fech_reg"];

                if($row["usu_img"] !=''){
                    $output["usu_img"] = '<img src="../../assets/images/users/'.$row["usu_img"].'"class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_usuario_imagen" value="'.$row["usu_img"].'" />';
                }else{
                    $output["usu_img"] = '<img src="../../assets/images/users/not_photo.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_usuario_imagen" value="" />';
                } 
                
            }
            /* TODO:Codificamos el resultado en un JSON y asi pasarlo a la vista Usuario */
            echo json_encode($output);
        }
        
    break;

    case 'eliminar':
        $usuario->delete_usuario($_POST["usu_id"]);
    break;

      /* TODO: Listado de Productos */
    case "combo";
             $datos=$usuario->get_tipo_usuario();
            if(is_array($datos)==true and count($datos)>0){
            $html="";
            $html.="<option selected>Seleccionar</option>";
         foreach($datos as $row){
                $html.= "<option value='".$row["tipo_id"]."'>".$row["tpuse_nombre"]."</option>";
            }
            echo $html;
        }
    break;

    
}



?>