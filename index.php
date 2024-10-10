<?php

require_once ('modelos/usuarios.php');
require_once ('modelos/perfiles.php');
require_once ('modelos/permisos.php');
require_once('controladores/plantilla.controlador.php');
# require_once('controladores/login.controlador.php');


$plantilla = new PlantillaControlador();
$plantilla->traer_plantilla();
