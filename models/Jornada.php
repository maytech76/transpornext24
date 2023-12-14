<?php

class Jornada extends ConectarSql{

    /* TODO:Listado de jornadas (Show DataTable) */
    public function get_jornada(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_JORNADA_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra jornada especifico segun id (Show Edit)*/
    public function get_jornada_id($jor_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_JORNADA_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $jor_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Jornada (Create) */
    public function insert_jornada($jor_descripcion, $jor_valor){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_JORNADA (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $jor_descripcion);
        $query->bindValue(2, $jor_valor);
       
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro (Update)*/
    public function update_jornada($jor_id, $jor_descripcion, $jor_valor){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_JORNADA_01 (?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $jor_id);
        $query->bindValue(2, $jor_descripcion);
        $query->bindValue(3, $jor_valor);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de jornada especifico (Delete)*/
    public function delete_jornada($jor_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_JORNADA (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $jor_id);
        $sql->execute();
    }
}

?>