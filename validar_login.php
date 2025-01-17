<?php
require 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    try {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $resultado = $stmt->fetch();

        if ($resultado && password_verify($password, $resultado['contrasena'])) {
            $_SESSION['usuario'] = $resultado['usuario'];
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: index.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
