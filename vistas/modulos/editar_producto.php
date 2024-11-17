<?php

$item = "id_producto";
$valor = $rutas[1];

$producto = ControladorProductos::ctrMostrarProductos($item, $valor);
$categorias = Controladorcategorias::ctrMostrarcategorias();

if ($producto) {
?>

    <div class="col-lg-12 mt-4">
        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Editar producto</h5>
            </div><!-- end card header -->

            <div class="card-body">
                <form method="POST">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                            value="<?php echo $producto["nombre"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" id="precio" name="precio" class="form-control" value="<?php echo $producto["precio"]; ?>" placeholder="Precio" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" value="<?php echo $producto["stock"]; ?>" placeholder="Stock" required>
                    </div>

                    <div class="mb-3">
                        <label for="example-select" class="form-label">Categorías</label>
                        <select class="form-select" name="categoria" id="example-select" required>

                            <option value="">Selecciona una opción</option>

                            <?php foreach ($categorias as $key => $value) { ?>

                                <option

                                    <?php if ($value["id_categoria"] == $producto["id_categoria"]) { ?>

                                    selected

                                    <?php } ?>

                                    value="<?php echo $value["id_categoria"]; ?>"><?php echo $value["nombre_categoria"]; ?></option>

                            <?php } ?>

                        </select>
                    </div>

                    <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"]; ?>">

                    <?php
                    $editar = new ControladorProductos();
                    $editar->ctrEditarProducto();
                    ?>

                    <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

                </form>
            </div>

        </div>
    </div>

<?php } else { ?>
    <h3>Producto no disponible</h3>
<?php } ?>