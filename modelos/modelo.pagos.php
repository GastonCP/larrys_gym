<?php

require_once 'conexion.php';

class ModeloPagos
{

    ////////////////////////////////////////////////////////////////////////////////
    
    // Mostrar todos los pagos
    static public function mdlMostrarPagos()
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM pagos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Mostrar un pago específico por id
    static public function mdlMostrarPago($item, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM pagos WHERE $item = :$item");
            $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////

    // Agregar un nuevo pago
    static public function mdlAgregarPago($datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO pagos (id_cliente, id_plan, fecha_pago, metodo_pago, estado, descripcion) 
                VALUES (:id_cliente, :id_plan, :fecha_pago, :metodo_pago, :estado, :descripcion)"
            );

            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Editar un pago existente
    static public function mdlEditarPago($datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE pagos 
                SET id_cliente = :id_cliente, id_plan = :id_plan, fecha_pago = :fecha_pago, 
                    metodo_pago = :metodo_pago, estado = :estado, descripcion = :descripcion 
                WHERE id_pago = :id_pago"
            );

            $stmt->bindParam(":id_pago", $datos["id_pago"], PDO::PARAM_INT);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Eliminar un pago
    static public function mdlEliminarPago($id_pago)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM pagos WHERE id_pago = :id_pago");
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

    public static function mdlMostrarPagosConPrecios($tablaPagos, $tablaPlanes) {
        $stmt = Conexion::conectar()->prepare("
            SELECT 
                p.id_pago, 
                p.id_cliente, 
                p.fecha_pago, 
                p.metodo_pago, 
                p.estado, 
                p.descripcion, 
                pl.nombre_plan, 
                pl.precio 
            FROM $tablaPagos p
            INNER JOIN $tablaPlanes pl ON p.id_plan = pl.id_plan
        ");
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para mostrar un pago
    // public static function mdlMostrarPago($tabla, $campo, $valor) {
    //     $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");
    //     $stmt->bindParam(":$campo", $valor, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetch();
    // }

    // Método para actualizar el estado de un pago
    public static function mdlActualizarPago($tabla, $id_pago, $estado) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE id_pago = :id_pago");
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":id_pago", $id_pago, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


}

?>
