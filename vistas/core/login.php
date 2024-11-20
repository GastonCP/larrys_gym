<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // Verifica que ambos campos no estén vacíos
    if (!empty($username) && !empty($password)) {
        $sql = "SELECT id, usuario, contraseña, rol FROM usuarios WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {// Verifica si se encontró un usuario con el nombre proporcionado
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['contraseña'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['usuario'];
                $_SESSION['role'] = $user['rol'];

                // Redirigir según el rol del usuario
                if ($user['rol'] === 'admin') {
                    header("Location: admin_dashboard.php"); //te manda a la entrada para administradores
                } else {
                    header("Location: dashboard.php"); //te lleva a la entrada para usuarios
                }
                exit;
            } else {
                $error = "Credenciales incorrectas.";
            }
        } else {
            $error = "Credenciales incorrectas.";
        }
    } else {
        $error = "Por favor, complete todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
