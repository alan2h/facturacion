<?php

require_once('../modelos/productos.php');

$respuesta = array();

$producto = new Productos();

$resultado = $producto->buscar_producto_codigo_barra($_POST['codigo_barra']);

if ($resultado->num_rows > 0){
    while($row = $resultado->fetch_assoc()){
        $respuesta['nombre'] = $row['nombre'];
        $respuesta['precio'] = $row['precio_venta'];
        $respuesta['stock'] = $row['stock'];
    }
    echo json_encode($respuesta);
}else{
    $respuesta['nombre'] = '';
    $respuesta['precio_venta'] = '';
    $respuesta['stock'] = '';
    echo json_encode($respuesta);
}