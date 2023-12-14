<?php

class Modelo extends ConectarSql{

    /* TODO:Listado de modelos (Show DataTable) */
    public function get_modelo(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_MODELO_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra modelo especifico segun id (Show Edit)*/
    public function get_modelo_id($mdl_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_MODELO_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mdl_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Modelo (Create) */
    public function insert_modelo($mrc_nombre,){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_MODELO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mrc_nombre);
       
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro (Update)*/
    public function update_modelo($mdl_id, $mrc_nombre){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_MODELO_01 (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mdl_id);
        $query->bindValue(2, $mrc_nombre);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de modelo especifico (Delete)*/
    public function delete_modelo($mdl_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_MODELO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mdl_id);
        $sql->execute();
    }
}

?>