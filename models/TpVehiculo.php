<?php

class TpVehiculo extends ConectarSql{

    /* TODO:Listado de TpVehiculos */
    public function get_tp_vehiculo(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_TP_VEHICULO_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra TpVehiculo especifico segun id */
    public function get_tp_vehiculo_id($tvh_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_TP_VEHICULO_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tvh_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:insertar nuevo registro TpVehiculo */
    public function insert_tp_vehiculo($tvh_descripcion, $tvh_capacidad){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_I_NEW_TP_VEHICULO (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tvh_id);
        $query->bindValue(2, $tvh_descripcion);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
   

    /* TODO:Actualizamos registro */
    public function update_tp_vehiculo($tvh_id, $tvh_descripcion, $tvh_capacidad){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_U_TP_VEHICULO_01 (?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tvh_id);
        $query->bindValue(2, $tvh_descripcion);
        $query->bindValue(3, $tvh_capacidad);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de TpVehiculo especifico */
    public function delete_tp_vehiculo($tvh_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_TP_VEHICULO(?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tvh_id);
        $sql->execute();
    }
}

?>