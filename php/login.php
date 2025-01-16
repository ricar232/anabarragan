<?php
session_start();
include 'conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        // Consulta segura utilizando placeholders
        $stmt = $conn->prepare("SELECT * FROM system_users WHERE username = :username AND password = :password");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $_SESSION['user'] = $username;
            header('Location: ../dashboard.php'); // Redirección al dashboard
            exit();
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
            exit();
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "<script>alert('Acceso no autorizado');</script>";
    echo "<script>window.location.href = '../index.php';</script>";
    exit();
}
?>
