<?php

class Empresa extends ConectarSql{

    /* TODO:Listado de empresas (Show DataTable) */
    public function get_empresa(){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_EMPRESA_01";
        $query=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }



    /* TODO:Muestra empresa especifico segun id (Show Edit)*/
    public function get_empresa_id($emp_id){
        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_L_EMPRESA_X_ID (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $emp_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:insertar nuevo registro Empresa (Create) */
    public function insert_empresa($emp_rut, $emp_nombre, $emp_direccion, $emp_web, $emp_telf, $emp_correo, $emp_img){
        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_I_NEW_EMPRESA (?,?,?,?,?,?,?)";

        $query=$conectar->prepare($sql);
        $query->bindValue(1, $emp_rut);
        $query->bindValue(2, $emp_nombre);
        $query->bindValue(3, $emp_direccion);
        $query->bindValue(4, $emp_web);
        $query->bindValue(5, $emp_telf);
        $query->bindValue(6, $emp_correo);
        $query->bindValue(7, $emp_img);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }



    /* TODO:Actualizamos registro (Update)*/
    public function update_empresa($emp_id, $emp_rut, $emp_nombre, $emp_direccion, $emp_web, $emp_telf, $emp_correo, $emp_img){

        $conectar=parent::ConexionSql();
        parent::set_names();

        $sql ="call SP_U_EMPRESA_01 (?,?,?,?,?,?,?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $emp_id);
        $query->bindValue(2, $emp_rut);
        $query->bindValue(3, $emp_nombre);
        $query->bindValue(4, $emp_direccion);
        $query->bindValue(5, $emp_web);
        $query->bindValue(6, $emp_telf);
        $query->bindValue(7, $emp_correo);
        $query->bindValue(8, $emp_img);
        
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }


    /* TODO:Eliminamos del listado a tipo de empresa especifico (Delete)*/
    public function delete_empresa($emp_id){

        $conectar=parent::ConexionSql();
        parent::set_names();
        $sql ="call SP_D_EMPRESA (?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $emp_id);
        $sql->execute();
    }
    
}

?>