<?php
  // session_start();
  require_once('modelos/permisos.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturacion</title>
     <!-- Latest compiled and minified CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/fc2e78bfa3.js" crossorigin="anonymous"></script>
  
</head>
<body>

 <!-- /.navbar-t start -->
 <?php 
            if (isset($_SESSION['perfiles_nombre'])){
              if ($_SESSION['perfiles_nombre']){
                include('vistas/componentes/navbar.php');
              }
            }
            //switch (){
              //case 'Administrador':
                
              //  break;
              //case 'Vendedor':
              //  include('vistas/componentes/vendedor.navbar.php');
              //  break;
              //case 'Gerente':
              //  include('vistas/componentes/gerente.navbar.php');
              //  break;
              //default:
              //  break;
            //}
            ?>
          <!-- /.navbar-t end -->
   

      <?php 
        if (isset($_GET['message'])){
          echo '<div class="alert alert-'.$_GET['status'].'" role="alert">
                  '.$_GET['message'].'
                </div>';
        }
      ?>
      <div class="container">
        <?php
          
          if (isset($_GET['page'])){
            if (isset($_SESSION['nombre_usuario'])) {
              
              if ($_GET['page'] == 'login' 
                  || $_GET['page'] == 'listado_usuarios' 
                  || $_GET['page'] == 'cambiar_password' 
                  || $_GET['page'] == 'listado_modulos' 
                  || $_GET['page'] == 'ventas' 
                  || $_GET['page'] == 'salida'){
                    $permiso_ingreso = guard($_SESSION['perfiles_id']);
                    if ($permiso_ingreso){
                      include('vistas/paginas/'.$_GET['page'].'.php');
                    }else{
                      include('vistas/paginas/errores/403.php');
                    }
              }else{
                    include('vistas/paginas/errores/404.php');
              }
            }else{
              if ($_GET['page'] == 'password_olvidado'){
                include('vistas/paginas/'.$_GET['page'].'.php');
              }else{
                include('vistas/paginas/errores/403.php');
              }
            }
          }else{
            if (isset($_SESSION['nombre_usuario'])) {
              include('vistas/paginas/listado_usuarios.php');
            }else{
              include('vistas/paginas/login.php');
            }
            
          }

          function guard($id_perfil){
            $permisos = new Permiso();
            $resultados = $permisos->traer_permisos_por_perfil($id_perfil);
            $permiso_ingreso = false;
            foreach($resultados as $row){
              if ($row['nombre'] == $_GET['page']){
                $permiso_ingreso = true;
              }
            }
            return $permiso_ingreso;
          }
        ?>
      </div> 
      <!-- jquery -->
      <script src="assets/js/jquery-3.7.1.min.js"></script> 
      <!-- Latest compiled JavaScript -->
      <script src="assets/js/bootstrap.bundle.min.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <script>
        $(document).ready(function() {
          $('#id_perfiles').select2();
          $('#id_perfil').select2();
        });
        
      </script>
</body>
</html>