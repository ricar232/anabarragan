<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Consulta para obtener el usuario
        $stmt = $conn->prepare("SELECT * FROM system_users WHERE username = ? AND password = ?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['user'] = $username;
            header('Location: ../dashboard.php');
            exit(); // Asegúrate de que este exit esté aquí para detener el script
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "<script>alert('Acceso no autorizado');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
?>
