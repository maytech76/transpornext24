<?php

class Usuario extends ConectarSql{

    /* TODO:Listado de usuarios */
    public function get_usuario(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_USUARIO_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:Muestra usuario especifico segun id */
    public function get_usuario_id($usu_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_USUARIO_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    /* TODO:insertar nuevo registro Usuario */
    public function insert_usuario($tipo_id, $nick, $correo, $nombre, $apellido, $contacto, $clave){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_I_NEW_USUARIO (?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $tipo_id);
        $query->bindValue(2, $nick);
        $query->bindValue(3, $correo);
        $query->bindValue(4, $nombre);
        $query->bindValue(5, $apellido);
        $query->bindValue(6, $contacto);
        $query->bindValue(7, $clave);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }


    /* TODO:Actualizamos registro */
    public function update_usuario($usu_id, $nick, $correo, $nombre, $apellido, $contacto, $clave){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_U_USUARIO_01 (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $query->bindValue(2, $nick);
        $query->bindValue(3, $correo);
        $query->bindValue(4, $nombre);
        $query->bindValue(5, $apellido);
        $query->bindValue(6, $contacto);
        $query->bindValue(7, $clave);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de usuario especifico */
    public function delete_usuario(){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_USUARIO (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $usu_id);
        $sql->execute();
    }
}

?>