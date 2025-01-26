<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="background"></div>
    <div class="login-container">
        <h1><i class="fas fa-user-circle"></i> Iniciar Sesión</h1>

        <!-- Mensajes de error -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p class="error-message"><i class="fas fa-exclamation-triangle"></i> Usuario o contraseña incorrectos.</p>
        <?php endif; ?>

        <!-- Formulario de login para usuarios registrados -->
        <form action="validar_login.php" method="POST">
            <div class="input-container">
                <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="input-container">
                <label for="password"><i class="fas fa-lock"></i> Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
        </form>

        <!-- Botón para acceso de invitados -->
        <div class="guest-login">
            <p>¿Eres un invitado?</p>
            <form action="pagina_invitado.php" method="POST">
                <button type="submit" class="btn-guest"><i class="fas fa-user"></i> Entrar como Invitado</button>
            </form>
        </div>
    </div>

    <style>
        .guest-login {
            margin-top: 20px;
            text-align: center;
        }

        .btn-guest {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-guest:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
