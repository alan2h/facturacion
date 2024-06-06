<div class="row">
    <div class="col"></div>
        <div class="col" style="border: solid 1px; background: rgb(168, 168, 221); margin-top: 10%;">
            <form method="POST" action="controladores/login.controlador.php">
                <input type="hidden" name="action" value="login" />
                <div class="mb-3 mt-3">
                    <label for="nombre_usuario" class="form-label">Nombre de usuario:</label>
                    <input type="text" class="form-control" id="nombre_usuario" placeholder="nombre_usuario" name="nombre_usuario">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="form-check mb-3">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Recuerdame
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </form> 
        </div>
    <div class="col"></div>
</div>
