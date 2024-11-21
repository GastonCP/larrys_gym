<?php
// Llamar al controlador para obtener todos los pagos
$pagos = ControladorPagos::ctrMostrarPagos();
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
                                <th>Fecha de Pago</th>
                                <th>Monto</th>
                                <th>Método de Pago</th>
                                <th>Clase</th>
                                <th>Estado</th>
                                <th>Plan Asociado</th>
                                <th>Estado Cliente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pagos as $pago) { ?>
                            <tr>
                                <td><?php echo $pago["id_pago"]; ?></td>
                                <td><?php echo $pago["id_cliente"]; ?></td>
                                <td><?php echo $pago["fecha_pago"]; ?></td>
                                <td><?php echo "$ " . number_format($pago["monto"], 2); ?></td>
                                <td><?php echo $pago["metodo_pago"]; ?></td>
                                <td><?php echo $pago["id_clase"]; ?></td>
                                <td><?php echo $pago["estado"]; ?></td>
                                <td><?php echo $pago["id_plan"]; ?></td>
                                <td><?php echo $pago["estado_cliente"]; ?></td>
                                <td>
                                    <!-- Botón Editar Pago -->
                                    <a href="pagos_editar/<?php echo $pago['id_pago']; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                    <!-- Botón Eliminar Pago -->
                                    <button
                                        class="btn btn-danger btnEliminarPago"
                                        id_pago=<?php echo $pago["id_pago"]; ?>
                                    >
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </td>
                            </tr>

                            <input type="hidden" id="url" value="<?php echo $url; ?>">

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
$eliminar = new ControladorPagos();
$eliminar->ctrEliminarPago();
?>
