<?php

class Chofer extends ConectarSql{

    /* TODO:Listado de chofers (Show DataTable) */
    public function get_chofer(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_CHOFER_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }



    /* TODO:Muestra chofer especifico segun id (Show Edit)*/
    public function get_chofer_id($chof_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_CHOFER_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $chof_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Chofer (Create) */
    public function insert_chofer($lic_id, $chof_rut, $chof_nombre, $chof_apellido, $chof_direccion, $chof_celular, $chof_correo, $chof_datos_banco, $chof_tipo_sangre, $chof_contacto){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_CHOFER (?,?,?,?,?,?,?,?,?,?)";

        $query=$conectar->prepare($sql);
        $query->bindValue(1, $lic_id);
        $query->bindValue(2, $chof_rut);
        $query->bindValue(3, $chof_nombre);
        $query->bindValue(4, $chof_apellido);
        $query->bindValue(5, $chof_direccion);
        $query->bindValue(6, $chof_celular);
        $query->bindValue(7, $chof_correo);
        $query->bindValue(8, $chof_datos_banco);
        $query->bindValue(9, $chof_tipo_sangre);
        $query->bindValue(10, $chof_contacto);
        
        
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }



    /* TODO:Actualizamos registro (Update)*/
    public function update_chofer($chof_id, $chof_rut, $chof_nombre, $chof_apellido, $chof_direccion, $chof_celular, $chof_correo, $chof_datos_banco, $chof_tipo_sangre, $chof_contacto){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_CHOFER_01 (?,?,?,?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $chof_id);
        $query->bindValue(2, $lic_id);
        $query->bindValue(3, $chof_rut);
        $query->bindValue(4, $chof_nombre);
        $query->bindValue(5, $chof_apellido);
        $query->bindValue(6, $chof_direccion);
        $query->bindValue(7, $chof_celular);
        $query->bindValue(8, $chof_correo);
        $query->bindValue(9, $chof_datos_banco);
        $query->bindValue(10, $chof_tipo_sangre);
        $query->bindValue(11, $chof_contacto);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de chofer especifico (Delete)*/
    public function delete_chofer($chof_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_CHOFER (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $chof_id);
        $sql->execute();
    }
    
}

?>