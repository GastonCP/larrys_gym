<?php

require_once 'conexion.php';

class ModeloClientes
{
    static public function mdlMostrarClientes($item, $valor)
    {
        try {
            $db = Conexion::conectar();

            if ($item != null) {
                $stmt = $db->prepare(
                    "SELECT c.id_cliente, c.dni, c.nombre, c.apellido, c.fecha_nacimiento, c.direccion, c.telefono, 
                            c.email, c.fecha_inscripcion, c.estado, p.id_plan, p.nombre_plan 
                     FROM clientes AS c
                     LEFT JOIN planes_entrenamiento AS p ON c.id_plan = p.id_plan
                     WHERE $item = :$item"
                );
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = $db->prepare(
                    "SELECT c.id_cliente, c.dni, c.nombre, c.apellido, c.fecha_nacimiento, c.direccion, c.telefono, 
                            c.email, c.fecha_inscripcion, c.estado, p.id_plan, p.nombre_plan 
                     FROM clientes AS c
                     LEFT JOIN planes_entrenamiento AS p ON c.id_plan = p.id_plan"
                );
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlAgregarCliente($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (dni, nombre, apellido, fecha_nacimiento, direccion, telefono, email, fecha_inscripcion, estado, id_plan) 
                 VALUES (:dni, :nombre, :apellido, :fecha_nacimiento, :direccion, :telefono, :email, :fecha_inscripcion, :estado, :id_plan)"
            );

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarCliente($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dni = :dni, nombre = :nombre, apellido = :apellido, fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, telefono = :telefono, email = :email, fecha_inscripcion = :fecha_inscripcion, estado = :estado, id_plan = :id_plan WHERE id_cliente = :id_cliente");
    
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
            $stmt->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarCliente($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente");
            
            $stmt->bindParam(":id_cliente", $dato, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    
}



?>
