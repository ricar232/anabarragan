<?php
// Activar reporte de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Configuración de la conexión
    $host = 'localhost';
    $port = 3306; // Cambiar si usas otro puerto
    $dbname = 'login_system';
    $username = 'ana';
    $password = 'ana*123';

    // Crear conexión PDO
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $conn = new PDO($dsn, $username, $password);

    // Configuración de atributos para PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Manejo de errores en la conexión
    die('Error de conexión: ' . $e->getMessage());
}
?>
