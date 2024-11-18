<?php

class ControladorClientes
{
    // Mostrar clientes
    static public function ctrMostrarClientes($item, $valor)
    {
        $respuesta = ModeloClientes::mdlMostrarClientes($item, $valor);
        return $respuesta;
    }

    // Método para agregar clientes
    static public function ctrAgregarCliente()
    {
        if (isset($_POST["dni"])) {
            $tabla = "clientes";

            $datos = array(
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "fecha_nacimiento" => $_POST["fecha_nacimiento"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "fecha_inscripcion" => $_POST["fecha_inscripcion"],
                "estado" => $_POST["estado"],
                "id_plan" => $_POST["plan"]
            );

            $respuesta = ModeloClientes::mdlAgregarCliente($tabla, $datos);

            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "clientes";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El cliente se agregó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    public function ctrEditarCliente()
    {
        if (isset($_POST["id_cliente"])) {
            $tabla = "clientes";
    
            $datos = array(
                "id_cliente" => $_POST["id_cliente"],
                "dni" => $_POST["dni"],
                "nombre" => $_POST["nombre"],
                "apellido" => $_POST["apellido"],
                "fecha_nacimiento" => $_POST["fecha_nacimiento"],
                "direccion" => $_POST["direccion"],
                "telefono" => $_POST["telefono"],
                "email" => $_POST["email"],
                "fecha_inscripcion" => $_POST["fecha_inscripcion"],
                "estado" => $_POST["estado"],
                "id_plan" => $_POST["plan"]
            );
    
            $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
    
            if ($respuesta == "ok") {
                $url = ControladorPlantilla::url() . "clientes";
                echo '<script>
                    fncSweetAlert(
                        "success",
                        "El cliente se actualizó correctamente",
                        "' . $url . '"
                    );
                </script>';
            }
        }
    }

    static public function ctrEliminarCliente()
    {
        if (isset($_GET["id_cliente_eliminar"])) {

            $url = ControladorPlantilla::url() . "clientes";
            $tabla = "clientes";
            $dato = $_GET["id_cliente_eliminar"];

            $respuesta = ModeloClientes::mdlEliminarCliente($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "El cliente se eliminó correctamente", "' . $url . '");
                </script>';
                        }
                    }
    }

    
}

?>

