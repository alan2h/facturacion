
<?php

require_once('conexion.php');

class Productos
{
    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $categoria;
    private $imagen;
    private $descripcion;

    public function __construct()
    {
        $this->id = 0;
        $this->nombre = '';
        $this->precio = 0;
        $this->stock = 0;
        $this->categoria = '';
        $this->imagen = '';
        $this->descripcion = '';
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function buscar_producto_codigo_barra($codigo_barra)
    {
        $conexion = new Conexion();
        $query = "SELECT * FROM productos WHERE codigo_barras = '$codigo_barra'";
        $resultado = $conexion->consultar($query);
        return $resultado;
    }
}

?>