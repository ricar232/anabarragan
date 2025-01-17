<?php
// Configuración de conexión a la base de datos
$host = "localhost";           // Dirección del servidor (normalmente localhost)
$dbname = "segurosanabarragan"; // Nombre de la base de datos
$username = "ana";             // Usuario de la base de datos
$password = "ana*123";   // Contraseña del usuario

try {
    // Crear una conexión utilizando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar PDO para que lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Para depuración (opcional): Comentar o eliminar en producción
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    // Manejar errores de conexión
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
