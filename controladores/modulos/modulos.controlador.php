<?php

ini_set('display_errors', 1);
require_once ('../../modelos/permisos.php');

if (isset($_POST['action'])){
    if ($_POST['action'] == 'actualizar'){
        $modulo_controlador = new ModuloControlador();
        $modulo_controlador->actualizar();
    }
   

}


class ModuloControlador {

    public function actualizar(){
      $permiso = new Permiso();
      $permiso->setId($_POST['id']);
      $permiso->setPermisosID($_POST['permiso_id']);
      $permiso->actualizar();
      header('Location:../../index.php?page=listado_modulos&id='.$_POST['id']);
    }


}