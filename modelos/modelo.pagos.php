<?php

require_once 'conexion.php';

class ModeloPagos
{
    ////////////////////////////////////////////////////////////////////////////////
    
    // Mostrar todos los pagos
    static public function mdlMostrarPagos($tabla)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Mostrar un pago específico por un campo
    static public function mdlMostrarPago($tabla, $item, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    
    ////////////////////////////////////////////////////////////////////////////////

    // Agregar un nuevo pago
    static public function mdlAgregarPago($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (id_cliente, fecha_pago, monto, metodo_pago, id_clase, estado, id_plan, estado_cliente) 
                VALUES (:id_cliente, :fecha_pago, :monto, :metodo_pago, :id_clase, :estado, :id_plan, :estado_cliente)"
            );

            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":id_clase", $datos["id_clase"], PDO::PARAM_INT);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_cliente", $datos["estado_cliente"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Editar un pago existente
    static public function mdlEditarPago($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE $tabla 
                SET id_cliente = :id_cliente, fecha_pago = :fecha_pago, monto = :monto, 
                    metodo_pago = :metodo_pago, id_clase = :id_clase, estado = :estado, 
                    id_plan = :id_plan, estado_cliente = :estado_cliente 
                WHERE id_pago = :id_pago"
            );

            $stmt->bindParam(":id_pago", $datos["id_pago"], PDO::PARAM_INT);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":id_clase", $datos["id_clase"], PDO::PARAM_INT);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_cliente", $datos["estado_cliente"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////
    
    // Eliminar un pago
    static public function mdlEliminarPago($tabla, $id_pago)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pago = :id_pago");
            $stmt->bindParam(":id_pago", $id_pago, PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

}

?>
