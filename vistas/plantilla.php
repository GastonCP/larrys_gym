<?php
session_start();
$url = ControladorPlantilla::url();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Sistema Lab 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo $url; ?>vistas/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Datatables css -->
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url; ?>vistas/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

    <!-- Vendor -->
    <script src="<?php echo $url; ?>vistas/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/feather-icons/feather.min.js"></script>

    <!-- Datatables js -->
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

    <!-- dataTables.bootstrap5 -->
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>


    <!-- Datatable Demo App Js -->
    <script src="<?php echo $url; ?>vistas/assets/js/pages/datatable.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo $url; ?>vistas/assets/js/alerts.js"></script>
    <script src="<?php echo $url; ?>vistas/assets/js/eliminar.js"></script>

</head>

<!-- body start -->

<?php #if (isset($_SESSION["iniciarSesion"])) { ?>

    <body data-menu-color="dark" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">

            <!-- Topbar Start -->
            <?php include 'modulos/header.php' ?>
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            <?php include 'modulos/menu.php' ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <?php

                if (isset($_GET["pagina"])) {

                    $rutas = explode('/', $_GET["pagina"]);

                    //echo "<pre>";
                    //print_r($rutas);
                    //echo "</pre>";
                    if (
                        #$rutas[0] == "categorias" ||
                        #$rutas[0] == "productos" ||
                        #$rutas[0] == "agregar_producto" ||
                        #$rutas[0] == "editar_producto" ||
                        #$rutas[0] == "salir" ||
                        #$rutas[0] == "usuarios"
                        $rutas[0] == "planes" ||
                        $rutas[0] == "planes_agregar"
                        
                    ) {
                        
                        #include "vistas/modulos/" . $rutas[0] . ".php";
                        #Reemplace la linea anterioro con esta, y cree la carpeta ../vistas/core
                        #En la carpeta core podemos dejar las ventanas que creemos para no confundirnos con las de los modulos
                        include "vistas/core/" . $rutas[0] . ".php";
                        
                    } else {
                        include "vistas/modulos/404.php";
                    }
                }

                ?>

                <!-- Footer Start -->
                <?php include 'modulos/footer.php' ?>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>

        <!-- App js-->
        <script src="<?php echo $url; ?>vistas/assets/js/app.js"></script>



    </body>

<?php
# } else {
#    include "vistas/modulos/login.php";
#}
?>

</html>