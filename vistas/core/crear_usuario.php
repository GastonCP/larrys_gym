<?php
session_start();
require 'db_connection.php';

// Verificar si el usuario tiene rol de administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Procesar el formulario cuando se envía
    $nombre = trim($_POST['nombre']);
    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);
    // Valida que todos los campos están llenos
    if (!empty($nombre) && !empty($usuario) && !empty($email) && !empty($password) && !empty($rol)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Encripta la contraseña
        $sql = "INSERT INTO usuarios (nombre, usuario, email, contraseña, rol) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nombre, $usuario, $email, $hashed_password, $rol);

        if ($stmt->execute()) {
            header("Location: usuarios.php"); //redirige a usuarios.php si se crea con exito
            exit;
        } else {
            $error = "Error: " . $stmt->error;
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
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="crear_usuario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="admin">Administrador</option>
            <option value="usuario">Usuario</option>
        </select>
        <br>
        <button type="submit">Crear Usuario</button>
    </form>
</body>
</html>

