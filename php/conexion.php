<?php
$host = 'localhost'; // Servidor
$port = 3306;        // Puerto de MariaDB
$dbname = 'login_system'; // Nombre de la base de datos
$username = 'ana';  // Usuario que estás utilizando
$password = 'ana*123'; // Contraseña del usuario

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa.";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
