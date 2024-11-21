<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .card h3 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-size: 14px;
            color: #555;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="text-center">
                <p>Ingrese sus datos</p>
            </div>

            <!-- Formulario de inicio de sesión -->
            <form method="POST">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese su email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Ingrese su contraseña">
                </div>
                <?php
                    // Llamada al controlador de ingreso de usuarios
                    $ingreso = new ControladorUsuarios();
                    $ingreso->ctrIngresoUsuarios();
                ?>
                <div>
                    <button class="btn-primary" type="submit">Ingresar</button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
