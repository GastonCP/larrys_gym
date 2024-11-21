<?php

class ControladorUsuarios
{
    // Método para el inicio de sesión
    public static function ctrIngresoUsuarios()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($email) && !empty($password)) {
                global $conn;
                $sql = "SELECT id_usuario, email_usuario, contrasena_usuario FROM usuarios WHERE email_usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 1) {
                    $user = $result->fetch_assoc();
                    if (password_verify($password, $user['contrasena_usuario'])) {
                        $_SESSION['user_id'] = $user['id_usuario'];
                        $_SESSION['email'] = $user['email_usuario'];

                        // Redirigir al dashboard principal
                        header("Location: dashboard.php");
                        exit;
                    } else {
                        return "Credenciales incorrectas.";
                    }
                } else {
                    return "Credenciales incorrectas.";
                }
            } else {
                return "Por favor, complete todos los campos.";
            }
        }
    }

    // Método para mostrar todos los usuarios
    public static function ctrMostrarUsuarios()
    {
        global $conn;
        $sql = "SELECT id_usuario, nombre_usuario, email_usuario FROM usuarios";
        return $conn->query($sql);
    }

    // Método para agregar un nuevo usuario
    public static function ctrAgregarUsuarios()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            global $conn;
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($nombre) && !empty($email) && !empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios (nombre_usuario, email_usuario, contrasena_usuario) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $nombre, $email, $hashed_password);

                if ($stmt->execute()) {
                    header("Location: usuarios.php");
                    exit;
                } else {
                    return "Error: " . $stmt->error;
                }
            } else {
                return "Por favor, complete todos los campos.";
            }
        }
    }

    // Método para editar un usuario
    public static function ctrEditarUsuarios()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            global $conn;
            $id = $_POST['id_usuario'];
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);

            $sql = "UPDATE usuarios SET nombre_usuario = ?, email_usuario = ? WHERE id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $nombre, $email, $id);

            if ($stmt->execute()) {
                header("Location: usuarios.php");
                exit;
            } else {
                return "Error: " . $stmt->error;
            }
        }
    }

    // Método para eliminar un usuario
    public static function ctrEliminarUsuarios()
    {
        if (isset($_GET['id_usuario'])) {
            global $conn;
            $id = $_GET['id_usuario'];
            $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                header("Location: usuarios.php");
                exit;
            } else {
                return "Error: " . $stmt->error;
            }
        }
    }
}
?>
