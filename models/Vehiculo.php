<?php

class Vehiculo extends ConectarSql{

    /* TODO:Listado de vehiculos  () Show Table*/
    public function get_vehiculo(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_VEHICULO_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra vehiculo especifico segun id (Editar) */
    public function get_vehiculo_id($veh_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_VEHICULO_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $veh_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:insertar nuevo registro Vehiculo (Create)*/
    public function insert_vehiculo($tvh_id, $mrc_id, $mdl_id, $veh_descripcion, $color, $patente, $klm_actual){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_I_NEW_VEHICULO (?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
    
        $query->bindValue(1, $tvh_id);
        $query->bindValue(2, $mrc_id);
        $query->bindValue(3, $mdl_id);
        $query->bindValue(4, $veh_descripcion);
        $query->bindValue(5, $color);
        $query->bindValue(6, $patente);
        $query->bindValue(7, $klm_actual);

        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro (Update)*/
    public function update_vehiculo($veh_id, $tvh_id, $mrc_id, $mdl_id, $veh_descripcion, $color, $patente, $klm_actual){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_U_VEHICULO_01 (?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $veh_id);
        $query->bindValue(2, $tvh_id);
        $query->bindValue(3, $mrc_id);
        $query->bindValue(4, $mdl_id);
        $query->bindValue(5, $veh_descripcion);
        $query->bindValue(6, $color);
        $query->bindValue(7, $patente);
        $query->bindValue(8, $klm_actual);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de vehiculo especifico (Delete) */
    public function delete_vehiculo(){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_VEHICULO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $veh_id);
        $sql->execute();
    }
}

?>