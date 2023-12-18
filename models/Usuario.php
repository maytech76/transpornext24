<?php

class Usuario extends ConectarSql{

     /* TODO:Definimos funcion de conexion */
     public function login(){
        $conectar=parent::conexion();
        parent::set_names();
         if(isset($_POST["enviar"])){
          $correo = $_POST["usu_correo"];
          $clave = $_POST["usu_clave"];
          $tpuse_id = $_POST["tpuse_id"];
           if(empty($correo) and empty($clave)){
              header("location:".conectar::ruta()."index.php?m=2");
              exit;

           }else{
              /*  TODO:Consulta SQL a tabla usuario para validar su existencia */
              $Sql="call SP_L_USER_EXIST (?,?,?)";
              $stmt=$conectar->prepare($Sql);
              $stmt->bindValue(1, $correo);
              $stmt->bindValue(2, $clave);
              $stmt->bindValue(3, $tpuse_id);
              $stmt->execute();
              $resultado =$stmt->fetch();
                /* TODO:Verificamos que el resultado de la consulta SQL sea un Array y su valor mayor a 0 */
               if(is_array($resultado) and count($resultado)>0){

                /* TODO:Asignamos valores a variables de session los valores recibidos con la consulta SQL */
                 $_SESSION["usu_id"]=$resultado["usu_id"];
                 $_SESSION["usu_nombre"]=$resultado["usu_nombre"];
                 $_SESSION["usu_apellido"]=$resultado["usu_apellido"];
                 $_SESSION["tpuse_id"]=$resultado["tpuse_id"];
                 $_SESSION["usu_correo"]=$resultado["usu_correo"];
                 $_SESSION["est"]=$resultado["est"];
                 header("location:".Conectar::ruta()."view/Home/");
                 exit();
                    
                 /* TODO:Si no existe el usuario enviar por url m=1 */
               }else{
                 header("location:".Conectar::ruta()."index.php?m=1");
                 exit();
               }
           }
         }
      }

   
   
      /* TODO:Listado de usuarios */
    public function get_usuario(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_USUARIO_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra usuario especifico segun id */
    public function get_usuario_id($usu_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_USUARIO_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:insertar nuevo registro Usuario */
    public function insert_usuario($tipo_id, $nick, $correo, $nombre, $apellido, $contacto, $clave){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_I_NEW_USUARIO (?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tipo_id);
        $query->bindValue(2, $nick);
        $query->bindValue(3, $correo);
        $query->bindValue(4, $nombre);
        $query->bindValue(5, $apellido);
        $query->bindValue(6, $contacto);
        $query->bindValue(7, $clave);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro */
    public function update_usuario($usu_id, $nick, $correo, $nombre, $apellido, $contacto, $clave){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_U_USUARIO_01 (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $query->bindValue(2, $nick);
        $query->bindValue(3, $correo);
        $query->bindValue(4, $nombre);
        $query->bindValue(5, $apellido);
        $query->bindValue(6, $contacto);
        $query->bindValue(7, $clave);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de usuario especifico */
    public function delete_usuario(){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_USUARIO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $sql->execute();
    }
}

?>