<?php

class Marca extends ConectarSql{

    /* TODO:Listado de marcas (Show DataTable) */
    public function get_marca(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_MARCA_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra marca especifico segun id (Show Edit)*/
    public function get_marca_id($mrc_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_MARCA_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mrc_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Marca (Create) */
    public function insert_marca($mrc_nombre,){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_MARCA (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mrc_nombre);
       
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro (Update)*/
    public function update_marca($mrc_id, $mrc_nombre){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_MARCA_01 (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mrc_id);
        $query->bindValue(2, $mrc_nombre);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de marca especifico (Delete)*/
    public function delete_marca($mrc_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_MARCA (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $mrc_id);
        $sql->execute();
    }
}

?>