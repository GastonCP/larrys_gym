<?php

require_once 'conexion.php';

class ModeloUsuarios
{

    // Método para mostrar usuarios
    static public function mdlMostrarUsuarios($item, $valor)
    {
        if ($item != null) {
            try {
                $usuarios = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE $item = :$item");
                $usuarios->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $usuarios->execute();

                return $usuarios->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $usuarios = Conexion::conectar()->prepare("SELECT * FROM usuarios");
                $usuarios->execute();

                return $usuarios->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    // Método para agregar un usuario
    static public function mdlAgregarUsuarios($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (email_usuario, contrasena_usuario, nombre_usuario, apellido_usuario) 
                VALUES (:email, :contrasena, :nombre, :apellido)"
            );

            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Método para editar un usuario
    static public function mdlEditarUsuarios($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE $tabla 
                SET nombre_usuario = :nombre, apellido_usuario = :apellido, email_usuario = :email, contrasena_usuario = :contrasena 
                WHERE id_usuario = :id_usuario"
            );

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Método para eliminar un usuario
    static public function mdlEliminarUsuarios($tabla, $idUsuario)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");
            $stmt->bindParam(":id_usuario", $idUsuario, PDO::PARAM_INT);

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
