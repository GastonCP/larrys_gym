<?php
$productos = ControladorProductos::ctrMostrarProductos(null, null);

$cantidad = count($productos);
?>
<div class="row">
    <div class="col-12">
        <h1>Productos</h1>
        <div class="card">

            <div class="card-header">
                <a href="agregar_producto" class="btn btn-info">Agregar</a>
            </div><!-- end card header -->

            <?php if ($cantidad > 0) { ?>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($productos as $key => $value) {
                            ?>
                                <tr style="background-color:#000888">
                                    <td> <?php echo $value["nombre"] ?></td>
                                    <td>
                                        <?php
                                        if ($value["stock"] <= 5) { ?>
                                            <span class="badge bg-warning text-dark">
                                                <?php echo $value["stock"]; ?>
                                            </span>
                                        <?php } else {
                                            echo $value["stock"];
                                        }   ?>
                                    </td>
                                    <td>$ <?php echo number_format($value["precio"], 2) ?></td>
                                    <td><?php echo $value["nombre_categoria"] ?></td>

                                    <td><a href="editar_producto/<?php echo $value["id_producto"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    
                                    <button
                                    class="btn btn-danger btnEliminarProducto"
                                    id_producto=<?php echo $value["id_producto"]; ?>
                                    ><i class="fas fa-trash"></i></button></td>

                                </tr>

                                <input type="hidden" id="url" value="<?php echo $url; ?>">

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            <?php } else { ?>
                <h3>Productos no disponibles</h3>
            <?php } ?>

        </div>
    </div>
</div>

<?php 

$eliminar = new ControladorProductos();
$eliminar -> ctrEliminarProducto();

?>