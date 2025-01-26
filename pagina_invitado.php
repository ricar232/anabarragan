<?php
session_start();

// Configurar sesión para invitados
$_SESSION['invitado'] = true;

// Mostrar contenido exclusivo para invitados
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Invitado</title>
    <link rel="stylesheet" href="css/guest_page.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .guest-container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .guest-container h1 {
            margin: 0 0 10px;
            color: #333;
        }
        .guest-container p {
            margin: 0 0 20px;
            color: #666;
        }
        .guest-container a {
            display: inline-block;
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        .guest-container a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="guest-container">
        <h1>Bienvenido, Invitado</h1>
        <p>Acceso exclusivo para invitados.</p>
        <a href="logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>
