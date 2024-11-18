<?php
$cliente = null;

// Verificar que se recibe el parámetro id_cliente desde la URL
if (isset($_GET["pagina"])) {
    // Extraer el id_cliente del segmento de la URL
    $pagina = explode("/", $_GET["pagina"]);
    $id_cliente = $pagina[1];  // El id del cliente es el segundo segmento

    $item = "id_cliente";
    $valor = $id_cliente;

    $cliente = ControladorClientes::ctrMostrarClientes($item, $valor);

    // Obtener los planes de entrenamiento
    $planes = ModeloPlanes::mdlMostrarPlanes("planes_entrenamiento");
}

// Si no hay cliente, mostrar un mensaje de error
if (!$cliente) {
    echo '<div class="alert alert-danger">No se encontró el cliente.</div>';
    return;
}

?>



<div class="row">
    <div class="col-12">
        <h1>Editar Cliente</h1>
        <form method="POST">
            <input type="hidden" name="id_cliente" value="<?php echo $cliente["id_cliente"]; ?>">

            <div class="mb-3">
                <label>DNI</label>
                <input type="text" name="dni" class="form-control" value="<?php echo $cliente["dni"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $cliente["nombre"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $cliente["apellido"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $cliente["fecha_nacimiento"]; ?>" required>
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control" value="<?php echo $cliente["direccion"]; ?>">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $cliente["telefono"]; ?>">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $cliente["email"]; ?>">
            </div>

            <div class="mb-3">
                <label>Fecha de Inscripción</label>
                <input type="date" name="fecha_inscripcion" class="form-control" value="<?php echo $cliente["fecha_inscripcion"]; ?>">
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="1" <?php echo $cliente["estado"] == 1 ? "selected" : ""; ?>>Activo</option>
                    <option value="0" <?php echo $cliente["estado"] == 0 ? "selected" : ""; ?>>Inactivo</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Plan</label>
                <select name="plan" class="form-control">
                    <?php foreach ($planes as $plan) { ?>
                        <option value="<?php echo $plan["id_plan"]; ?>" <?php echo $cliente["id_plan"] == $plan["id_plan"] ? "selected" : ""; ?>>
                            <?php echo $plan["nombre_plan"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>

<?php
$editar = new ControladorClientes();
$editar->ctrEditarCliente();
?>
