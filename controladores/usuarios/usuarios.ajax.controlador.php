<?php
require_once ('../../modelos/usuarios.php');
$form_data = array(); 

if (isset($_POST['action'])){
    if ($_POST['action'] == 'ajax'){
       $usuario = new Usuario();
       $usuario->setNombre_usuario($_POST['nombre_usuario']);
       $usuario->validar_usuario();
       $resultado = $usuario->validar_usuario();
        if ($resultado->num_rows > 0){
            // existe ese usuario
            $form_data['data'] = 'error';
        }else{
            // no existe ese usuario
            $form_data['data'] = 'success';
        }
        echo json_encode($form_data);
    }
    if ($_POST['action'] == 'ajax_validacion_email'){
        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $usuario->validar_usuario();
        $resultado = $usuario->validar_email();
         if ($resultado->num_rows > 0){
             // existe ese usuario
             $form_data['data'] = 'error';
         }else{
             // no existe ese usuario
             $form_data['data'] = 'success';
         }
         echo json_encode($form_data);
     }
}

