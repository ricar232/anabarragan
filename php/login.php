<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            session_start();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $user['username']; // Guarda el usuario en la sesión
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
            echo "<script>window.location.href='../index.php';</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<script>alert('Método de solicitud no válido');</script>";
    echo "<script>window.location.href='../index.php';</script>";
}
?>
