<?php
ini_set('display_errors', 1);
require_once ('../modelos/usuarios.php');

if (isset($_POST['action'])){
    if ($_POST['action'] == 'login'){
        $login_controlador = new LoginControlador();
        $login_controlador->ingresar();
    }
}


class LoginControlador {

    public function ingresar(){
            $usuario = new Usuario();
            $usuario->setNombre_usuario($_POST['nombre_usuario']);
            $resultado = $usuario->validar_usuario();
            if ($resultado->num_rows > 0){
                while($row = $resultado->fetch_assoc()){
                    if (password_verify($_POST['password'], $row['password'])) {
                        header('Location: ../index.php?page=listado_usuarios');
                    }else{
                        header('Location:../index.php?message=Usuario o password no correcto&status=danger');
                    }
                }               
            }else{
                header('Location: ../index.php?message=Usuario o password no correcto&status=danger');
            }
        }

    public function registrar (){

    }
}