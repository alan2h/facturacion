<?php

ini_set('display_errors', 1);
require_once ('../../modelos/usuarios.php');

if (isset($_POST['action'])){
    if ($_POST['action'] == 'guardar'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->guardar();
    }
    if ($_POST['action'] == 'eliminar'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->eliminar();
    }
    if ($_POST['action'] == 'cambiar_password'){
        $usuario_controlador = new UsuarioControlador();
        $usuario_controlador->cambiar_password();
    }

}


class UsuarioControlador {

    public function guardar(){
        if (empty($_POST['nombre_usuario']) || empty($_POST['email']) || empty($_POST['perfiles_id'])){
            header('Location: ../../index.php?message=todos los datos son obligatorios&status=danger');
            return;
        }
        $usuarios = new Usuario();
        $usuarios->setNombre_usuario($_POST['nombre_usuario']);
        $usuarios->setEmail($_POST['email']);
        $usuarios->setPassword($_POST['nombre_usuario']);
        $usuarios->setPerfiles_id($_POST['perfiles_id']);
        $usuarios->guardar();
        header('Location: ../../index.php?message=usuario creado con exito&status=success');
    }

    public function eliminar(){
        $usuarios = new Usuario();
        $usuarios->setId($_POST['id']);
        $usuarios->eliminar();
        header('Location:../../index.php?message=usuario eliminado con exito&status=success');
    }

    public function cambiar_password(){
        if (empty($_POST['password']) || empty($_POST['password_confirm'])){
            header('Location:../../index.php?page=cambiar_password&message=todos los datos son obligatorios&status=danger');
            return;
        }
        if ($_POST['password'] != $_POST['password_confirm']){
            header('Location:../../index.php?page=cambiar_password&message=las contraseñas no coinciden&status=danger');
            return;
        }
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setPassword($_POST['password']);
        $usuario->cambiar_password();
        session_start();
        session_unset();
        session_destroy(); 
        header('Location:../../index.php?message=password cambiado con exito&status=success');
    }

}