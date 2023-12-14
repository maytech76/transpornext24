<?php

class Destino extends ConectarSql{

    /* TODO:Listado de destinos (Show DataTable) */
    public function get_destino(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_DESTINO_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra destino especifico segun id (Show Edit)*/
    public function get_destino_id($dest_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_DESTINO_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $dest_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Destino (Create) */
    public function insert_destino($dest_descripcion,){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_DESTINO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $dest_descripcion);
       
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro (Update)*/
    public function update_destino($dest_id, $dest_descripcion){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_DESTINO_01 (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $dest_id);
        $query->bindValue(2, $dest_descripcion);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de destino especifico (Delete)*/
    public function delete_destino($dest_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_DESTINO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $dest_id);
        $sql->execute();
    }
}

?>