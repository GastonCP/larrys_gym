<?php
// Llamar al controlador para obtener todos los pagos junto con el precio del plan asociado
$pagos = ControladorPagos::ctrMostrarPagosConPrecios();
$cantidad = count($pagos);
?>

<div class="row">
    <div class="col-12">
        <h1>Pagos</h1>
        <div class="card">
            <div class="card-header">
                <a href="pagos_agregar" class="btn btn-info">Registrar Nuevo Pago</a>
            </div>

            <?php if ($cantidad > 0) { ?>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Plan</th>
                                <th>Precio</th>
                                <th>Fecha de Pago</th>
                                <th>Método de Pago</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pagos as $pago) { ?>
                            <tr>
                                <td><?php echo $pago["id_pago"]; ?></td>
                                <td><?php echo $pago["id_cliente"]; ?></td>
                                <td><?php echo $pago["nombre_plan"]; ?></td>
                                <td><?php echo "$ " . number_format($pago["precio"], 2); ?></td>
                                <td><?php echo $pago["fecha_pago"]; ?></td>
                                <td><?php echo $pago["metodo_pago"]; ?></td>
                                <td><?php echo $pago["estado"]; ?></td>
                                <td><?php echo $pago["descripcion"]; ?></td>
                                <!-- <td>
                                    <span class="badge badge-<?#php echo $pago["estado"] === 'COMPLETADO' ? 'success' : 'warning'; ?>">
                                        <?php# echo $pago["estado"]; ?>
                                    </span>
                                </td>
                                <td><?php# echo $pago["descripcion"]; ?></td> -->
                                <td>
                                    <!-- Botón Editar Pago -->
                                    <a href="pagos_editar/<?php echo $pago['id_pago']; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                    <!-- Botón Eliminar Pago -->
                                    <button
                                        class="btn btn-danger btnEliminarPago"
                                        id_pago="<?php echo $pago["id_pago"]; ?>"
                                    >
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <h3>No hay pagos registrados</h3>
            <?php } ?>
        </div>
    </div>
</div>

<?php 
// Eliminar pago
$eliminar = new ControladorPagos();
$eliminar->ctrEliminarPago();
?>
