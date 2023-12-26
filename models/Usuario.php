<?php

class Usuario extends ConectarSql{

     /* TODO:Definimos funcion de conexion */
    public function login(){
        $conectar=parent::ConexionSql();
        parent::set_names();
         if(isset($_POST["enviar"])){
          $usu_correo = $_POST["usu_correo"];
          $usu_clave = $_POST["usu_clave"];
           if(empty($usu_correo) and empty($usu_clave)){
              header("location:".conectarSql::ruta()."index.php?m=2");
              exit;

           }else{
              /*  TODO:Consulta SQL a tabla usuario para validar la existencia
                   de los datos de usuario enviados desde el login */

              $Sql="call SP_L_USER_EXIST (?,?)";
              $stmt=$conectar->prepare($Sql);
              $stmt->bindValue(1, $usu_correo);
              $stmt->bindValue(2, $usu_clave);
             
              $stmt->execute();
              $resultado =$stmt->fetch();

                /* TODO:Si el resultado de la consulta SQL  SELECT ES un Array y su valor mayor a 0 */
               if(is_array($resultado) and count($resultado)>0){

                /* TODO:Asignamos valores a variables de session los valores recibidos con la consulta SQL */
                 $_SESSION["usu_id"]=$resultado["usu_id"];
                 $_SESSION["usu_nombre"]=$resultado["usu_nombre"];
                 $_SESSION["usu_apellido"]=$resultado["usu_apellido"];
                 $_SESSION["tpuse_id"]=$resultado["tpuse_id"];
                 $_SESSION["usu_correo"]=$resultado["usu_correo"];
                 $_SESSION["est"]=$resultado["est"];
                 header("location:".ConectarSql::ruta()."views/home/");
                
                 exit();
                    
                 /* TODO:Si no existe el usuario enviar por url m=1 */
               }else{
                 header("location:".ConectarSql::ruta()."index.php?m=1");
                 exit();
               }
           }
         }
    }

   
      /* TODO:Listado de usuarios */
    public function get_usuarios(){

      $conectar=parent::ConexionSql();
      $sql="call SP_L_USERS_TABLE";
      $query=$conectar->prepare($sql);
      $query->execute();
      return $query->fetchAll();

    }


    /* TODO:Muestra usuario especifico segun id */
    public function get_usuario_id($usu_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_USER_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
         

    }

    /* TODO:insertar nuevo registro Usuario */
    public function insert_user(
      
      $tipo_id,$usu_telefono,$usu_correo,
      $usu_nombre,$usu_apellido,$usu_contacto,
      $cont_telefono,$usu_pass,$usu_img){
       
      $conectar=parent::ConexionSql();
        
          /*  TODO:Funcion que tomara el dato recivido por la Variable $_FILES Y asignara un valor al campo usu_img */
          require_once("Usuario.php");
          $user = new Usuario();
          $usu_img='';

          if($_FILES["usu_img"]["name"] !=''){
              $usu_img=$user->upload_image();
              
          }


        /* parent::set_names(); */
        $sql ="call autosol.SP_I_NEW_USER (?,?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tipo_id);
        $query->bindValue(2, $usu_telefono);
        $query->bindValue(3, $usu_correo);
        $query->bindValue(4, $usu_nombre);
        $query->bindValue(5, $usu_apellido);
        $query->bindValue(6, $usu_contacto);
        $query->bindValue(7, $cont_telefono);
        $query->bindValue(8, $usu_pass);
        $query->bindValue(9, $usu_img);
        $query->execute();
        return $query->fetchAll();
    }


    /* TODO:Actualizamos registro */
    public function update_usuario(

        $usu_id, $tipo_id, $usu_telefono,
        $usu_correo, $usu_nombre, $usu_apellido, 
        $usu_contacto, $cont_telefono, $usu_pass,
        $usu_img
        ){

        $conectar=parent::ConexionSql();
      
        /*  TODO:Funcion que tomara el dato recivido por la Variable $_FILES Y asignara un valor al campo usu_img */
        require_once("Usuario.php");
        $user = new Usuario();
        $usu_img='';

        if($_FILES["usu_img"]["name"] !=''){
            $usu_img=$user->upload_image();
            
        }

        $sql ="call SP_U_USUARIO_ID (?,?,?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $query->bindValue(2, $tipo_id);
        $query->bindValue(3, $usu_telefono);
        $query->bindValue(4, $usu_correo);
        $query->bindValue(5, $usu_nombre);
        $query->bindValue(6, $usu_apellido);
        $query->bindValue(7, $usu_contacto);
        $query->bindValue(8, $cont_telefono);
        $query->bindValue(9, $usu_pass);
        $query->bindValue(10, $usu_img);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        


    }


    /* TODO:Eliminamos del listado a tipo de usuario especifico */
    public function delete_usuario($usu_id){

        $conectar=parent::ConexionSql();
        $sql ="call SP_D_USUARIO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $query->execute();
    }

      /* TODO: Subir imagen del usuario */
      public function upload_image(){
        if (isset($_FILES["usu_img"])){
            $extension = explode('.', $_FILES['usu_img']['name']);
            $new_name = rand() . '.' . $extension[1];
            $destination = '../assets/images/users/' . $new_name;
            move_uploaded_file($_FILES['usu_img']['tmp_name'], $destination);
            return $new_name;
        }
    }

  
}

?>