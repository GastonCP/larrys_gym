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
                $sql = "SELECT id, email, contraseña, rol FROM usuarios WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 1) {
                    $user = $result->fetch_assoc();
                    if (password_verify($password, $user['contraseña'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['role'] = $user['rol'];

                        // Redirigir según el rol
                        if ($user['rol'] === 'admin') {
                            header("Location: admin_dashboard.php");
                        } else {
                            header("Location: dashboard.php");
                        }
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

    // Método para mostrar todos los usuarios (solo para admins)
    public static function ctrMostrarUsuarios()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            global $conn;
            $sql = "SELECT id, nombre, email, rol FROM usuarios";
            return $conn->query($sql);
        } else {
            header("Location: login.php");
            exit;
        }
    }

    // Método para agregar un nuevo usuario (solo para admins)
    public static function ctrAgregarUsuarios()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            global $conn;
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $rol = trim($_POST['rol']);

            if (!empty($nombre) && !empty($email) && !empty($password) && !empty($rol)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios (nombre, email, contraseña, rol) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $nombre, $email, $hashed_password, $rol);

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

    // Método para editar un usuario (solo para admins)
    public static function ctrEditarUsuarios()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin' && $_SERVER['REQUEST_METHOD'] == 'POST') {
            global $conn;
            $id = $_POST['id'];
            $nombre = trim($_POST['nombre']);
            $email = trim($_POST['email']);
            $rol = trim($_POST['rol']);

            $sql = "UPDATE usuarios SET nombre = ?, email = ?, rol = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nombre, $email, $rol, $id);

            if ($stmt->execute()) {
                header("Location: usuarios.php");
                exit;
            } else {
                return "Error: " . $stmt->error;
            }
        }
    }

    // Método para eliminar un usuario (solo para admins)
    public static function ctrEliminarUsuarios()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            global $conn;
            $id = $_GET['id'];
            $sql = "DELETE FROM usuarios WHERE id = ?";
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

