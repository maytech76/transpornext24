<?php

class Origen extends ConectarSql{

    /* TODO:Listado de origenes (Show DataTable) */
    public function get_origen(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_ORIGEN_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra origen especifico segun id (Show Edit)*/
    public function get_origen_id($ori_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_ORIGEN_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $ori_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Origen (Create) */
    public function insert_origen($ori_descripcion,){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_ORIGEN (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $ori_descripcion);
       
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro (Update)*/
    public function update_origen($ori_id, $ori_descripcion){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_ORIGEN_01 (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $ori_id);
        $query->bindValue(2, $ori_descripcion);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de origen especifico (Delete)*/
    public function delete_origen($ori_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_ORIGEN (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $ori_id);
        $sql->execute();
    }
}

?>