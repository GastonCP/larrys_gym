<?php

class ControladorPagos
{
    ////////////////////////////////////////////////////////////////////////////////

    // Mostrar todos los pagos
    static public function ctrMostrarPagos()
    {
        $tabla = "pagos";
        $respuesta = ModeloPagos::mdlMostrarPagos($tabla);
        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Mostrar un pago específico
    static public function ctrMostrarPago($item, $valor)
    {
        $tabla = "pagos";
        $respuesta = ModeloPagos::mdlMostrarPago($tabla, $item, $valor);
        return $respuesta;
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Agregar un nuevo pago
    public function ctrAgregarPago()
    {
        if (isset($_POST["id_cliente"])) {
            $tabla = "pagos";

            $datos = array(
                "id_cliente" => $_POST["id_cliente"],
                "fecha_pago" => $_POST["fecha_pago"],
                "monto" => $_POST["monto"],
                "metodo_pago" => $_POST["metodo_pago"],
                "id_clase" => $_POST["id_clase"],
                "estado" => $_POST["estado"],
                "id_plan" => $_POST["id_plan"],
                "estado_cliente" => $_POST["estado_cliente"]
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
                "fecha_pago" => $_POST["fecha_pago"],
                "monto" => $_POST["monto"],
                "metodo_pago" => $_POST["metodo_pago"],
                "id_clase" => $_POST["id_clase"],
                "estado" => $_POST["estado"],
                "id_plan" => $_POST["id_plan"],
                "estado_cliente" => $_POST["estado_cliente"]
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

            $respuesta = ModeloPagos::mdlEliminarPago($tabla, $id_pago);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "pagos";
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
}

?>
