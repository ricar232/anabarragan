<?php
// Configuración de conexión a la base de datos
$host = "localhost";           // Dirección del servidor (normalmente localhost)
$dbname = "segurosanabarragan"; // Nombre de la base de datos
$username = "ana";             // Usuario de la base de datos
$password = "ana*123";   // Contraseña del usuario

// Intentar la conexión
try {
    // Crear una conexión usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar opciones para manejar errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mensaje de éxito para depuración (puedes eliminarlo en producción)
     echo "Conexión exitosa";
} catch (PDOException $e) {
    // Manejar errores de conexión
    die("Error de conexión: " . $e->getMessage());
}
?>
