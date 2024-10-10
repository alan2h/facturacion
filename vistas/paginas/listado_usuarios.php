<?php
  ini_set('display_errors', 1);
  $page_size = 3;
  $current_page = 0;

  if (isset($_GET['current_page'])){
    $current_page = $_GET['current_page'];
  }
  
  $perfil = new Perfil();
  $perfiles = $perfil->traer_perfiles();

  $usuarios = new Usuario();
  $usuarios->current_page = $current_page;
  $result_usuarios = $usuarios->traer_usuarios();

  $result_usuarios_cantidad = $usuarios->traer_usuarios_cantidad();
  //echo $result_usuarios_cantidad;
  foreach ($result_usuarios_cantidad as $usuarios_cantidad){
    $total_pages = $usuarios_cantidad['total']; //ceil($usuarios_cantidad['total'] / $page_size);
  }
  

?>

<h2>Listado de usuarios</h2>


<div class="row">
  <div class="col">
  <form method="post" action="controladores/usuarios/usuarios.controlador.php">
  <input type="hidden" name="action" value="guardar" />
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
      <input type="text" name="nombre_usuario" onfocusout="validate_username(event)" class="form-control" id="id_nombre_usuario" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" onfocusout="validate_email(event)" id="id_email" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Perfiles</label>
      <select name="perfiles_id" class="form-control" id="id_perfiles" >
        <option value="">Seleccione una perfil</option>
        <?php
          foreach($perfiles as $perfil){
        ?>
          <option value="<?php echo $perfil['id']?>"><?php echo $perfil['nombre']?></option>
        <?php } ?>
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
        <th>Nombre</th>
        <th>Email</th>
        <th>Perfil</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php 

            foreach($result_usuarios as $usuario){
      ?>
      <tr>
        <td><?= $usuario['nombre_usuario']; ?></td>
        <td><?= $usuario['email']; ?></td>
        <td><?= $usuario['nombre']; ?></td>
        <td> 
          <div class="row">
          <div class="col">  <button class="btn btn-success" type="button"><i class="fa-solid fa-pen-to-square"></i></button></div>
          <div class="col">  <a href="controladores/email.controlador.php?email=<?= $usuario['email']; ?>&id_usuario=<?= $usuario['usuarios_id']; ?>" class="btn btn-info" type="button"><i class="fa-solid fa-power-off"></i></a></div>
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
    <li class="page-item <?php if ($current_page == 0){ echo 'disabled'; } ?>"> <!--  -->
    <a class="page-link" href="index.php?page=listado_usuarios&current_page=<?= $current_page - 1 ?>">Atras</a>
    </li>
     <p><?= $total_pages ?></p>
    <li class="page-item <?php if ($current_page == $total_pages -1){ echo 'disabled'; } ?>">
      <a class="page-link" href="index.php?page=listado_usuarios&current_page=<?= $current_page + 1 ?>">Siguiente</a>
    </li>
  </ul>
</nav>
  </div>  
</div>

<script src="assets/js/validaciones/usuarios.js"></script>