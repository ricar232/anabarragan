<?php
require 'conexion.php';

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

try {
    // Preparar la consulta
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        echo "Inicio de sesión exitoso. Bienvenido, " . $resultado['usuario'];
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
