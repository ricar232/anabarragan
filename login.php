<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css"> <!-- Enlace a archivo CSS -->
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

        <form action="validar_login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario" required autofocus>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
