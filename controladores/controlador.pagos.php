<?php

class ControladorPagos
{
    ////////////////////////////////////////////////////////////////////////////////

    // Mostrar Pagos de entrenamiento
    static public function ctrMostrarPagos($item, $valor)
    {
        $respuesta = ModeloPagos::mdlMostrarPagos($item, $valor);
        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Controlador Mostrar un plan de entrenamiento
    static public function ctrMostrarPago($item, $valor)
    {
        $respuesta = ModeloPagos::mdlMostrarPago($item, $valor);
        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Agregar un nuevo pago
    public function ctrAgregarPago()
    {
        if (isset($_POST["id_cliente"]) && isset($_POST["metodo_pago"])) {
            $tabla = "pagos";

            $datos = array(
                "id_cliente" => $_POST["id_cliente"],
                "id_plan" => $_POST["id_plan"],
                "fecha_pago" => $_POST["fecha_pago"] ?? date("Y-m-d"),
                "metodo_pago" => $_POST["metodo_pago"],
                "estado" => $_POST["estado"] ?? "PENDIENTE",
                "descripcion" => $_POST["descripcion"] ?? null,
            );

            $respuesta = ModeloPagos::mdlAgregarPago($tabla, $datos);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "pagos";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El pago se agregó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Editar un pago existente
    public function ctrEditarPago()
    {
        if (isset($_POST["id_pago"])) {
            $tabla = "pagos";

            $datos = array(
                "id_pago" => $_POST["id_pago"],
                "id_cliente" => $_POST["id_cliente"],
                "id_plan" => $_POST["id_plan"],
                "fecha_pago" => $_POST["fecha_pago"],
                "metodo_pago" => $_POST["metodo_pago"],
                "estado" => $_POST["estado"],
                "descripcion" => $_POST["descripcion"],
            );

            $respuesta = ModeloPagos::mdlEditarPago($tabla, $datos);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "pagos";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El pago se editó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Eliminar un pago
    static public function ctrEliminarPago()
    {
        if (isset($_GET["id_pago_eliminar"])) {
            $tabla = "pagos";
            $id_pago = $_GET["id_pago_eliminar"];
            $url = ControladorPlantilla::url() . "pagos";

            $respuesta = ModeloPagos::mdlEliminarPago($tabla, $id_pago);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El pago se eliminó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }


    ////////////////////////////////////////////////////////////////////////////////


    static public function ctrMostrarPagosConPrecios() 
    {
        $tablaPagos = "pagos";
        $tablaPlanes = "planes_entrenamiento";

        $respuesta = ModeloPagos::mdlMostrarPagosConPrecios($tablaPagos, $tablaPlanes);

        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Método para mostrar el pago por su ID
    // public static function ctrMostrarPago($campo, $valor) {
    //     $tabla = "pagos"; // Nombre de la tabla
    //     $respuesta = ModeloPagos::mdlMostrarPago($tabla, $campo, $valor);
    //     return $respuesta;
    // }

    // Método para actualizar el estado de un pago
    public static function ctrActualizarPago($id_pago, $estado) {
        $tabla = "pagos"; // Nombre de la tabla
        $respuesta = ModeloPagos::mdlActualizarPago($tabla, $id_pago, $estado);
        if ($respuesta) {
            echo "<div class='alert alert-success'>El pago se actualizó correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al actualizar el pago.</div>";
        }
    }



}



?>
