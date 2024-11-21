<h1>Gestión de Usuarios</h1>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="agregar_usuario.php" class="btn btn-info">Agregar usuario</a>
            </div><!-- end card header -->

            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Obtener la lista de usuarios desde el controlador
                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);
                        foreach ($usuarios as $key => $usuario) {
                            ?>
                            <tr style="background-color:#000888">
                                <td><?php echo $usuario["nombre_usuario"]; ?></td>
                                <td><?php echo $usuario["apellido_usuario"]; ?></td>
                                <td><?php echo $usuario["cuenta_usuario"]; ?></td>
                                <td><?php echo $usuario["email_usuario"]; ?></td>
                                <td><?php echo $usuario["rol_usuario"]; ?></td>
                                <td>
                                    <!-- Enlace para editar el usuario -->
                                    <a href="editar_usuario.php?id_usuario=<?php echo $usuario["id_usuario"]; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a> 
                                    <!-- Botón para eliminar el usuario -->
                                    <button class="btn btn-danger btnEliminarUsuario" id_usuario="<?php echo $usuario["id_usuario"]; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- end card-body -->

        </div><!-- end card -->
    </div><!-- end col-12 -->
</div><!-- end row -->

<?php
// Llamada al controlador para manejar la eliminación de usuarios
$eliminar = new ControladorUsuarios();
$eliminar->ctrEliminarUsuarios();
?>

