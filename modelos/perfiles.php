<?php
ini_set('display_errors', 1);
require_once('conexion.php');


class Perfil{
    private $id;
    private $nombre;


    public function __construct($id='', $nombre=''){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function traer_perfiles(){
        $conexion = new Conexion();
        $query = "SELECT * FROM perfiles";
        return $conexion->consultar($query);
    }

    public function traer_perfil($id_perfil){
        $conexion = new Conexion();
        $query = "SELECT id, nombre FROM perfiles WHERE id = '$id_perfil'";
        return $conexion->consultar($query);
    }

    public function guardar(){
        $conexion = new Conexion();
        $query = "INSERT INTO perfiles (nombre) VALUES ('$this->nombre')";
        return $conexion->insertar($query);
    }
}
