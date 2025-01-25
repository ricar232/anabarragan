<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Enlace a archivo CSS -->
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p class="error-message">Usuario o contraseña incorrectos. Inténtalo de nuevo.</p>
        <?php elseif (isset($_GET['error']) && $_GET['error'] == 2): ?>
            <p class="error-message">Hubo un problema con la base de datos. Inténtalo más tarde.</p>
        <?php endif; ?>

        <!-- Formulario de inicio de sesión -->
        <form action="validar_login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario" required autofocus>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>

        <!-- Botón para invitados -->
        <div class="guest-login">
            <p>¿Eres un invitado?</p>
            <a href="pagina_invitado.php" class="guest-button">Entrar como Invitado</a>
        </div>
    </div>

    <style>
        .guest-login {
            margin-top: 20px;
            text-align: center;
        }

        .guest-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .guest-button:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
