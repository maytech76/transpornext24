<?php

class Cliente extends ConectarSql{

    /* TODO:Listado de clientes (Show DataTable) */
    public function get_cliente(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_CLIENTE_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }



    /* TODO:Muestra cliente especifico segun id (Show Edit)*/
    public function get_cliente_id($cli_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_CLIENTE_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Cliente (Create) */
    public function insert_cliente($cli_rut, $cli_nombre, $cli_direccion, $cli_telf, $cli_correo, $cli_coordinador, $cli_contacto){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_CLIENTE (?,?,?,?,?,?,?)";

        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_rut);
        $query->bindValue(2, $cli_nombre);
        $query->bindValue(3, $cli_direccion);
        $query->bindValue(4, $cli_telf);
        $query->bindValue(5, $cli_correo);
        $query->bindValue(6, $cli_coordinador);
        $query->bindValue(7, $cli_contacto);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }



    /* TODO:Actualizamos registro (Update)*/
    public function update_cliente($cli_id, $cli_rut, $cli_nombre, $cli_direccion, $cli_telf, $cli_correo, $cli_coordinador, $cli_contacto){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_CLIENTE_01 (?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_id);
        $query->bindValue(2, $cli_rut);
        $query->bindValue(3, $cli_nombre);
        $query->bindValue(4, $cli_direccion);
        $query->bindValue(5, $cli_telf);
        $query->bindValue(6, $cli_correo);
        $query->bindValue(7, $cli_coordinador);
        $query->bindValue(8, $cli_contacto);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de cliente especifico (Delete)*/
    public function delete_cliente($cli_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_CLIENTE (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $cli_id);
        $sql->execute();
    }
    
}

?>