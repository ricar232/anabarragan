<?php
$host = 'localhost';
$dbname = 'login_system';

// Cambia estas credenciales para cada usuario que pruebes
$username = 'brenda';
$password = 'brenda*123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa con el usuario $username.";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
