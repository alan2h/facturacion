<?php
ini_set('display_errors', 1);
require_once ('../modelos/usuarios.php');
require_once ('../modelos/perfiles.php');

session_start();

if (isset($_POST['action'])){
    if ($_POST['action'] == 'login'){
        $login_controlador = new LoginControlador();
        $login_controlador->ingresar();
    }
}


class LoginControlador {

    public function ingresar(){
            $usuario = new Usuario();
            $perfil = new Perfil();
            $usuario->setNombre_usuario($_POST['nombre_usuario']);
            $resultado = $usuario->validar_usuario();
            if ($resultado->num_rows > 0){
                while($row = $resultado->fetch_assoc()){
                    if (password_verify($_POST['password'], $row['password'])) {
                        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
                        $_SESSION['usuario_id'] = $row['id'];
                        // --- obtiene el perfil inicio
                        $resultado_perfiles = $perfil->traer_perfil($row['perfiles_id']);
                        while($row_perfiles = $resultado_perfiles->fetch_assoc()){
                            $_SESSION['perfiles_id'] = $row['perfiles_id'];
                            $_SESSION['perfiles_nombre'] = $row_perfiles['nombre'];
                        }
                        // --- obtiene el perfil fin

                        
                        if (password_verify($row['nombre_usuario'], $row['password'])){
                            // es un usuario nuevo
                            return header('Location:../index.php?page=cambiar_password&message=Usted es un usuario nuevo, cambiar su password&status=danger');
                        }
                        
                        
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