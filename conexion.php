<?php
// Configuración de conexión a la base de datos
$host = "localhost";
$dbname = "segurosanabarragan";
$username = "ana";
$password = "ana*123";

try {
    // Crear una conexión utilizando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
