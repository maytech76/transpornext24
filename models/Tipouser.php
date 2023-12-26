<?php

class Tipouser extends ConectarSql{

     /* TODO:Definimos funcion de conexion */
    public function login(){
        $conectar=parent::ConexionSql();
        parent::set_names();
         if(isset($_POST["enviar"])){
          $tpuse_correo = $_POST["tpuse_correo"];
          $tpuse_clave = $_POST["tpuse_clave"];
           if(empty($tpuse_correo) and empty($tpuse_clave)){
              header("location:".conectarSql::ruta()."index.php?m=2");
              exit;

           }else{
              /*  TODO:Consulta SQL a tabla tipouser para validar la existencia
                   de los datos de tipouser enviados desde el login */

              $Sql="call SP_L_USER_EXIST (?,?)";
              $stmt=$conectar->prepare($Sql);
              $stmt->bindValue(1, $tpuse_correo);
              $stmt->bindValue(2, $tpuse_clave);
             
              $stmt->execute();
              $resultado =$stmt->fetch();

                /* TODO:Si el resultado de la consulta SQL  SELECT ES un Array y su valor mayor a 0 */
               if(is_array($resultado) and count($resultado)>0){

                /* TODO:Asignamos valores a variables de session los valores recibidos con la consulta SQL */
                 $_SESSION["tpuse_id"]=$resultado["tpuse_id"];
                 $_SESSION["tpuse_nombre"]=$resultado["tpuse_nombre"];
                 $_SESSION["tpuse_apellido"]=$resultado["tpuse_apellido"];
                 $_SESSION["tpuse_id"]=$resultado["tpuse_id"];
                 $_SESSION["tpuse_correo"]=$resultado["tpuse_correo"];
                 $_SESSION["est"]=$resultado["est"];
                 header("location:".ConectarSql::ruta()."views/home/");
                
                 exit();
                    
                 /* TODO:Si no existe el tipouser enviar por url m=1 */
               }else{
                 header("location:".ConectarSql::ruta()."index.php?m=1");
                 exit();
               }
           }
         }
    }

   
      /* TODO:Listado de tipousers */
    public function get_tipo_user(){

      $conectar=parent::ConexionSql();
      $sql="call SP_L_TIPO_USERS_TABLE";
      $query=$conectar->prepare($sql);
      $query->execute();
      return $query->fetchAll();

    }


    /* TODO:Muestra Listado de tipouser  */
    public function get_tipouser_id($tpuse_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_TIPOUSER_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpuse_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:insertar nuevo registro Tipouser */
    public function insert_user($tipo_id, $tpuse_telefono, $tpuse_correo, $tpuse_nombre, $tpuse_apellido, $tpuse_contacto, $cont_telefono, $tpuse_pass, $tpuse_img){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_I_NEW_USER (?,?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tipo_id);
        $query->bindValue(2, $tpuse_telefono);
        $query->bindValue(3, $tpuse_correo);
        $query->bindValue(4, $tpuse_nombre);
        $query->bindValue(5, $tpuse_apellido);
        $query->bindValue(6, $tpuse_contacto);
        $query->bindValue(7, $cont_telefono);
        $query->bindValue(8, $tpuse_pass);
        $query->bindValue(9, $tpuse_img);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro */
    public function update_tipouser($tpuse_id, $nick, $correo, $nombre, $apellido, $contacto, $clave){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_U_TIPOUSER_01 (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpuse_id);
        $query->bindValue(2, $nick);
        $query->bindValue(3, $correo);
        $query->bindValue(4, $nombre);
        $query->bindValue(5, $apellido);
        $query->bindValue(6, $contacto);
        $query->bindValue(7, $clave);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de tipouser especifico */
    public function delete_tipouser(){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_TIPOUSER (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpuse_id);
        $sql->execute();
    }

  
}

?>