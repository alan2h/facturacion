<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturacion</title>
     <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/images/avatar.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Registrar Usuario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Listado de usuarios</a>
              </li>
            </ul>
          
          </div>
        </div>
      </nav> 

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
            if ($_GET['page'] == 'login' 
                || $_GET['page'] == 'listado_usuarios' 
                || $_GET['page'] == 'salida'){

                  include('vistas/paginas/'.$_GET['page'].'.php');

            }else{
                  include('vistas/paginas/404.php');
            }
          }else{
            include('vistas/paginas/login.php');
          }
        ?>
      </div> 
    
</body>
</html>