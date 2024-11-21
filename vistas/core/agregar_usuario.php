<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar Usuario</h5>
        </div>

        <div class="card-body">
            <form method="POST">

                <!-- Campo Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>

                <!-- Campo Apellido -->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                </div>

                <!-- Campo Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                </div>

                <!-- Campo Contraseña -->
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>

                <?php
                $guardar = new ControladorUsuarios();
                $guardar->ctrAgregarUsuarios();
                ?>

                <!-- Botón para enviar el formulario -->
                <button class="btn btn-info" type="submit">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar
                </button>

            </form>
        </div>

    </div>
</div>


