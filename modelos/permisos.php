<?php

require_once ('conexion.php');

class Permiso{
    
    private $id;
    private $nombre;
    private $permisos_id;

    public function __construct($id='', $nombre=''){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setPermisosID($perfiles_id){
        $this->permisos_id = $perfiles_id;
    }

    public function actualizar (){
        $conexion = new Conexion();
        $query = "DELETE from perfiles_has_permisos where perfiles_id = '$this->id'";
        $conexion->actualizar($query);
        foreach($this->permisos_id as $permiso_id){
            $conexion = new Conexion();
            $query = "INSERT into perfiles_has_permisos(perfiles_id, permisos_id, activo) values ('$this->id', '$permiso_id', 1)";
            $conexion->actualizar($query);
        }
        return $this->id;
    }

    public function traer_permisos(){
        $conexion = new Conexion();
        $query = "SELECT * FROM permisos";
        return $conexion->consultar($query);
    }


    public function traer_permisos_por_perfil($perfiles_id){
        $conexion = new Conexion();
        $query = "select permisos.* from permisos inner join  perfiles_has_permisos on perfiles_has_permisos.permisos_id = permisos.id  where perfiles_has_permisos.perfiles_id=".$perfiles_id;
        return $conexion->consultar($query);
    }

    public function traer_todos_permisos(){
        $conexion = new Conexion();
        $query = "SELECT perfiles.id as perfiles_id, perfiles.nombre as perfiles_nombre, permisos.id as permisos_id, permisos.nombre as permisos_nombre FROM facturacion.perfiles_has_permisos inner join perfiles on 
                  perfiles.id = perfiles_has_permisos.perfiles_id inner join permisos
                  on permisos.id = perfiles_has_permisos.permisos_id;";
        return $conexion->consultar($query);
    }


}