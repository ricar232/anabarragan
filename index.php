<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        
        <!-- Mostrar mensaje de error -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p class="error-message">Usuario o contraseña incorrectos.</p>
        <?php endif; ?>

        <form action="validar_login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
