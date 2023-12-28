<?php

class TpCliente extends ConectarSql{

   
      /* TODO:Listado de tpclientes */
    public function get_tpclientes(){

      $conectar=parent::ConexionSql();
      $sql="call SP_L_TPCLIENTE";
      $query=$conectar->prepare($sql);
      $query->execute();
      return $query->fetchAll();

    }


    /* TODO:Muestra tpcliente especifico segun id */
    public function get_tpcliente_id($tpc_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_TPCLIENTE_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpc_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
         

    }


    /* TODO:insertar nuevo registro TpCliente */
    public function insert_tpcliente(
      
      $tpc_nombre,$valor){
       
        $conectar=parent::ConexionSql();
        
        /* parent::set_names(); */
        $sql ="call SP_I_NEW_TPCLIENTE (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpc_nombre);
        $query->bindValue(2, $valor);
        $query->execute();
        return $query->fetchAll();
    }


    /* TODO:Actualizamos registro */
    public function update_tp_cliente(

        $tpc_id, $tpc_nombre, $valor
    
      ){

        $conectar=parent::ConexionSql();

        $sql ="call SP_U_TP_CLIENTE(?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpc_id);
        $query->bindValue(2, $tpc_nombre);
        $query->bindValue(3, $valor);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        


    }


    /* TODO:Eliminamos del listado a tipo de tpcliente especifico */
    public function delete_tpcliente($tpc_id){

        $conectar=parent::ConexionSql();
        $sql ="call SP_D_TPCLIENTE (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tpc_id);
        $query->execute();
    }



  
}

?>