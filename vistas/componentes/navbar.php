<?php

  require_once('modelos/permisos.php');

  // session_start();

  

?>

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
                    

                      <?php 
                      if (isset($_SESSION['perfiles_id'])){
                        $permiso = new Permiso();
                        $permisos = $permiso->traer_permisos_por_perfil($_SESSION['perfiles_id']);
                        while($row = $permisos->fetch_assoc()){
                          if ($row['nombre'] == 'usuarios'){
                            echo '
                            
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuarios
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=listado_usuarios">Listar Usuarios</a></li>
                                <li><a class="dropdown-item" href="index.php?page=listado_modulos">Listar Modulos</a></li>
                              </ul>
                            </li>';
                          }
                        }
                      }
                        
                      ?>
                      
                      <li class="nav-item">
                      <a class="nav-link" href="vistas/paginas/salida.php">Cerrar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav> 