<?php

require_once 'conexion.php';

class ModeloEspecialidad
{
    static public function mdlMostrarEspecialidad($item, $valor)
    {
        try {
            $db = Conexion::conectar();

            if ($item != null) {
                $stmt = $db->prepare(
                    "SELECT * 
                     FROM especialidades AS e
                     WHERE $item = :$item"
                );
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = $db->prepare(
                    "SELECT *
                     FROM especialidades AS e"
                );
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlAgregarEspecialidad($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (nombre_especialidad) VALUES (:nombre_especialidad)");

            $stmt->bindParam(":nombre_especialidad", $datos["nombre_especialidad"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEspecialidad($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_especialidad = :nombre_especialidad WHERE id_especialidad = :id_especialidad");
    
            $stmt->bindParam(":nombre_especialidad", $datos["nombre_especialidad"], PDO::PARAM_STR);
            $stmt->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarEspecialidad($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_especialidad = :id_especialidad");
            
            $stmt->bindParam(":id_especialidad", $dato, PDO::PARAM_INT);
            
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