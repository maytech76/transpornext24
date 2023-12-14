<?php

class Pasajero extends ConectarSql{

    /* TODO:Listado de pasajeros (Show DataTable) */
    public function get_pasajero(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_PASAJERO_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }



    /* TODO:Muestra pasajero especifico segun id (Show Edit)*/
    public function get_pasajero_id($pas_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_PASAJERO_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $pas_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Pasajero (Create) */
    public function insert_pasajero($cli_id, $pas_nombre, $pas_celular, $pas_direccion){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_PASAJERO (?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_id);
        $query->bindValue(2, $pas_nombre);
        $query->bindValue(3, $pas_celular);
        $query->bindValue(4, $pas_direccion);
       
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }



    /* TODO:Actualizamos registro (Update)*/
    public function update_pasajero($pas_id, $cli_id, $pas_nombre, $pas_celular, $pas_direccion){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_PASAJERO_01 (?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $pas_id);
        $query->bindValue(2, $cli_id);
        $query->bindValue(3, $pas_nombre);
        $query->bindValue(4, $pas_celular);
        $query->bindValue(5, $pas_direccion);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de pasajero especifico (Delete)*/
    public function delete_pasajero($pas_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_PASAJERO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $pas_id);
        $sql->execute();
    }
    
}

?>