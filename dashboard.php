<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Conexión a la base de datos
$host = 'localhost';
$port = 3316; // Cambia el puerto según tu configuración
$user = 'root';
$password = 'Aa*1234567*';
$dbname = 'login_system';

$conn = new mysqli($host, $user, $password, $dbname, $port);
if ($conn->connect_error) {
    die('Conexión fallida: ' . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido, <span><?php echo htmlspecialchars($_SESSION['user']); ?></span>!</h1>
            <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
        </header>
        
        <section>
            <h2>Registrar Usuario</h2>
            <form action="handle_register_user.php" method="POST">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Registrar</button>
            </form>
        </section>
    </div>
</body>
</html>
