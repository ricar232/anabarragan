<?php
// Incluir el archivo de conexión
require 'conexion.php';

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

try {
    // Preparar la consulta SQL
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :password";
    $stmt = $conn->prepare($sql);

    // Asociar parámetros
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':password', $password);

    // Ejecutar consulta
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe
    if ($resultado) {
        echo "Inicio de sesión exitoso. Bienvenido, " . $resultado['usuario'];
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
