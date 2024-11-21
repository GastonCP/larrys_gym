<?php
$item = "id_usuario";
$valor = $_GET["id_usuario"];

$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Editar Usuario</h5>
        </div>

        <div class="card-body">
            <form method="POST">

                <!-- Campo Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                        value="<?php echo $usuario['nombre_usuario']; ?>" required>
                </div>

                <!-- Campo Apellido -->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido"
                        value="<?php echo $usuario['apellido_usuario']; ?>" required>
                </div>

                <!-- Campo Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico"
                        value="<?php echo $usuario['email_usuario']; ?>" required>
                </div>

                <!-- Campo Contraseña -->
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" class="form-control"
                        placeholder="Contraseña" value="" required>
                    <small>Deje en blanco si no desea cambiar la contraseña.</small>
                </div>



                <!-- Campo ID de usuario (oculto para evitar cambios accidentales) -->
                <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">

                <?php
                // Se llama al controlador para realizar la edición del usuario
                $editar = new ControladorUsuarios();
                $editar->ctrEditarUsuarios();
                ?>

                <!-- Botón para guardar los cambios -->
                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</button>

            </form>
        </div>

    </div>
</div>
