<?php
  ini_set('display_errors', 1);
  $perfil = new Perfil();
  $perfiles = $perfil->traer_perfiles();

  $usuarios = new Usuario();
  $result_usuarios = $usuarios->traer_usuarios();

  $permisos = new Permiso();
  $result_permisos = $permisos->traer_permisos();

  if (isset($_GET['id'])){
    $perfiles_editar = $perfil->traer_perfil($_GET['id']);
    $result_permisos_editar = $permisos->traer_permisos_por_perfil($_GET['id']);
  }

  
  
?>

<h2>Listado de Modulos</h2>


<div class="row">
  <div class="col">
  <form method="post" action="controladores/modulos/modulos.controlador.php">
    <?php if (isset($_GET['id'])){ ?>
      <input type="hidden" name="action" value="actualizar" />
      <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
    <?php }else{?>
      <input type="hidden" name="action" value="guardar" />
    <?php }?>


    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre de perfil</label>
      <input <?php if (isset($_GET['id'])){ foreach($perfiles_editar as $perfil){ echo 'value='.$perfil['nombre']; }} ?> type="text" name="nombre_perfil" class="form-control" id="id_nombre_perfil" aria-describedby="emailHelp">
    </div>

  
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Modulos</label>
      <select multiple id="id_perfil" name="permiso_id[]" class="form-control" >
        <option value="">Seleccione un modulo</option>
        <?php
          foreach($result_permisos as $permiso){
            foreach($result_permisos_editar as $permiso_editar){
              if($permiso['id'] == $permiso_editar['id']){
                echo "<option value='".$permiso['id']."' selected>".$permiso['nombre']."</option>";
              }else{
                //echo "<option value='".$permiso['id']."'>".$permiso['nombre']."</option>";
              }
            }
            echo "<option value='".$permiso['id']."'>".$permiso['nombre']."</option>";
          }
       ?>
      </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
  </div>
  <div class="col">
  <form class="row g-3">
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Buscar</label>
    <input type="text" class="form-control" id="inputPassword2" placeholder="Ingrese un texto">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirmar</button>
  </div>
</form>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Perfil</th>
        <th>Modulo</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php 

            foreach($perfiles as $perfil){
      ?>
      <tr>
        <td><?= $perfil['nombre']; ?></td>
        <td><?php 
          $permisos = new Permiso();
          $result_permisos = $permisos->traer_permisos_por_perfil($perfil['id']);
          foreach($result_permisos as $permiso){
            echo $permiso['nombre']."<br>";
          }
        ?></td>
        <td> 
          <div class="row">
          <div class="col"> 
            <a href="index.php?page=listado_modulos&id=<?=$perfil['id']; ?>" class="btn btn-success" type="button">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
          </div>
            <div class="col">
              <form action="controladores/usuarios/usuarios.controlador.php" method="post">
                <input type="hidden" name="action" value="eliminar" />
                <input type="hidden" name="id" value="<?= $usuario['usuarios_id'] ?>" />
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
              </form>
           </div>
          </div>
         
      
      </tr>

              <?php } ?>
    </tbody>
</table>

<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item"> <!-- disabled -->
      <span class="page-link">Previo</span>
    </li>
   
    <li class="page-item">
      <a class="page-link" href="#">Siguiente</a>
    </li>
  </ul>
</nav>
  </div>  
</div>

<script src="assets/js/validaciones/usuarios.js"></script>