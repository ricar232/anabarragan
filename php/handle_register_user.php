<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$host = 'localhost';
$port = 3316; // Cambia el puerto según tu configuración
$user = 'ana';
$password = 'ana*123';
$dbname = 'login_system';

$conn = new mysqli($host, $user, $password, $dbname, $port);
if ($conn->connect_error) {
    die('Conexión fallida: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Inserción del nuevo usuario
    $stmt = $conn->prepare("INSERT INTO system_users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente.');</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Error al registrar usuario.');</script>";
    }

    $stmt->close();
}
$conn->close();
?>
