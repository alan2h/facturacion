<link rel="stylesheet" href="assets/css/login.css">

<div class="row">
    <div class="col"></div>
        <div class="col" style="border: solid 1px; margin-top: 10%;">
            <form id="id_form" method="POST" action="controladores/login.controlador.php">
                <input type="hidden" name="action" value="login" />
                <div class="mb-3 mt-3">
                    <label for="nombre_usuario" class="form-label">Nombre de usuario:</label>
                    <input type="text" class="form-control" id="nombre_usuario" placeholder="nombre_usuario" name="nombre_usuario">
                    <p id="id_usuario_parrafo" style="color:red; display:none">Usuario requerido</p>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                    <p id="id_password_parrafo" style="color:red; display:none">Password requerido</p>
                </div>
                <div class="form-check mb-3" id="id_remember">
                    <label class="form-check-label">
                    <input class="form-check-input"  type="checkbox" name="remember"> Recordarme
                    </label>
                </div>
                <div class="d-grid gap-2">
                    <button onclick="validate()" type="button" class="btn btn-success" type="button">Ingresar</button>
                    <button class="btn btn-info" type="button">Registrarme</button>
                </div>
            </form> 
        </div>
    <div class="col"></div>
</div>

<script src="assets/js/validaciones/login.js"></script>
