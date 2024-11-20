<?php
$clientes = ControladorClientes::ctrMostrarClientes(null, null);

$cantidad = count($clientes);
?>

<div class="row">
    <div class="col-12">
        <h1>Clientes</h1>
        <div class="card">
            <div class="card-header">
                <a href="agregar_cliente" class="btn btn-info">Agregar Cliente</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Fecha de Inscripción</th>
                                <th>Estado</th>
                                <th>Plan</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($clientes as $cliente) { ?>
                            <tr>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["apellido"]; ?></td>
                                <td><?php echo $cliente["fecha_nacimiento"]; ?></td>
                                <td><?php echo $cliente["direccion"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["email"]; ?></td>
                                <td><?php echo $cliente["fecha_inscripcion"]; ?></td>
                                <td><?php echo $cliente["estado"] == 1 ? "Activo" : "Inactivo"; ?></td>
                                <td><?php echo $cliente["nombre_plan"] ?? "Sin Plan"; ?></td>
                                <td>
                                    <a href="editar_cliente/<?php echo $cliente["id_cliente"]; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button
                                    class="btn btn-danger btnEliminarCliente"
                                    id_cliente=<?php echo $cliente["id_cliente"]; ?>
                                    ><i class="fas fa-trash"></i> Eliminar</button></td>

                                </tr>

                                <input type="hidden" id="url" value="<?php echo $url; ?>">

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <h3>No hay clientes registrados</h3>
            <?php } ?>
        </div>
    </div>
</div>

<?php 

$eliminar = new ControladorClientes();
$eliminar -> ctrEliminarCliente();

?>