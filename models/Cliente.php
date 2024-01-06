<?php

class Cliente extends ConectarSql{


      /* TODO:Listado de clientes */
    public function get_clientes(){

      $conectar=parent::ConexionSql();
      $sql="call SP_L_CLIENTS_TABLE";
      $query=$conectar->prepare($sql);
      $query->execute();
      return $query->fetchAll();

    }


    /* TODO:Muestra cliente especifico segun id */
    public function get_cliente_id($cli_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_CLIENT_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
         

    }



    /* TODO:insertar nuevo registro Cliente */
    public function insert_cliente(
      
      $tpc_id, $cli_rut, $cli_nombre,
      $cli_direccion, $cli_telefono, $cli_correo,
      $cli_coordinador, $precio, $cli_img){
       
      $conectar=parent::ConexionSql();
        
          /*  TODO:Funcion que tomara el dato recivido por la Variable $_FILES Y asignara un valor al campo cli_img */
          require_once("Cliente.php");
          $client = new Cliente();
          $cli_img='';

          if($_FILES["cli_img"]["name"] !=''){
              $cli_img=$client->upload_image();
              
          }


        /* parent::set_names(); */
        $sql ="call autosol.SP_I_NEW_CLIENT (?,?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpc_id);
        $query->bindValue(2, $cli_rut);
        $query->bindValue(3, $cli_nombre);
        $query->bindValue(4, $cli_direccion);
        $query->bindValue(5, $cli_telefono);
        $query->bindValue(6, $cli_correo);
        $query->bindValue(7, $cli_coordinador);
        $query->bindValue(8, $precio);
        $query->bindValue(9, $cli_img);
        $query->execute();
        return $query->fetchAll();
    }





    /* TODO:Actualizamos registro */
    public function update_cliente(
      
      $cli_id, $tpc_id, $cli_rut, $cli_nombre,
      $cli_direccion, $cli_telefono, $cli_correo,
      $cli_coordinador, $precio, $cli_img){
       
      $conectar=parent::ConexionSql();
        
          /*  TODO:Funcion que tomara el dato recivido por la Variable $_FILES Y asignara un valor al campo cli_img */
          require_once("Cliente.php");
          $client = new Cliente();
          $cli_img='';

          if($_FILES["cli_img"]["name"] !=''){
              $cli_img=$client->upload_image();
              
          }


        /* parent::set_names(); */
        $sql ="call SP_U_CLIENTE_ID (?,?,?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_id);
        $query->bindValue(2, $tpc_id);
        $query->bindValue(3, $cli_rut);
        $query->bindValue(4, $cli_nombre);
        $query->bindValue(5, $cli_direccion);
        $query->bindValue(6, $cli_telefono);
        $query->bindValue(7, $cli_correo);
        $query->bindValue(8, $cli_coordinador);
        $query->bindValue(9, $precio);
        $query->bindValue(10, $cli_img);
        $query->execute();
        return $query->fetchAll();
    }



    /* TODO:Eliminamos del listado a tipo de cliente especifico */
    public function delete_cliente($cli_id){

        $conectar=parent::ConexionSql();
        $sql ="call SP_D_CLIENTE (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_id);
        $query->execute();
    }



      /* TODO: Subir imagen del cliente */
      public function upload_image(){
        if (isset($_FILES["cli_img"])){
            $extension = explode('.', $_FILES['cli_img']['name']);
            $new_name = rand() . '.' . $extension[1];
            $destination = '../assets/images/clients/' . $new_name;
            move_uploaded_file($_FILES['cli_img']['tmp_name'], $destination);
            return $new_name;
        }
    }

  
}

?>