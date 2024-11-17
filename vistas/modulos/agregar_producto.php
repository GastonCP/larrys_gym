<?php

$categorias = Controladorcategorias::ctrMostrarcategorias();

?>

<div class="col-lg-12 mt-4">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Agregar producto</h5>
        </div><!-- end card header -->

        <div class="card-body">
            <form method="POST">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" id="precio" name="precio" class="form-control" placeholder="Precio" required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" placeholder="Stock" required>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">Categorías</label>
                    <select class="form-select" name="categoria" id="example-select" required>

                    <option value="">Selecciona una opción</option>

                    <?php foreach ($categorias as $key => $value) { ?>

                        <option value="<?php echo $value["id_categoria"]; ?>"><?php echo $value["nombre_categoria"]; ?></option>

                    <?php } ?>                        
                       
                    </select>
                </div>

                <?php
                $guardar = new ControladorProductos();
                $guardar ->ctrAgregarProductos();
                ?>

                <button class="btn btn-info" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

            </form>
        </div>

    </div>
</div>