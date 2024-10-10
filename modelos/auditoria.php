<?php

require_once('conexion.php');

session_start();

class Auditoria {
    private $id;
    private $accion;
    private $id_tabla;
    private $nombre_tabla;
    private $nombre_usuario;
    private $fecha_hora;

    public function __construct($accion, $id_tabla, $nombre_tabla) {
        $this->accion = $accion;
        $this->id_tabla = $id_tabla;
        $this->nombre_tabla = $nombre_tabla;
        $this->nombre_usuario = $_SESSION['nombre_usuario'];
        $this->fecha_hora = date('Y-m-d H:i:s');
    }

    public function guardar(){
        $conexion = new Conexion();
        $query = "INSERT INTO auditoria (accion, id_tabla, nombre_tabla, fecha_hora, nombre_usuario) VALUES ('$this->accion', $this->id_tabla, '$this->nombre_tabla', '$this->fecha_hora', '$this->nombre_usuario')";
        echo $query;
        return $conexion->insertar($query);
    }
}