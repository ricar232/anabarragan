<?php
session_start();
include 'conexion.php'; // Asegúrate de que este archivo tenga la conexión correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        // Consulta para verificar el usuario y la contraseña
        $stmt = $conn->prepare("SELECT * FROM system_users WHERE username = ? AND password = ?");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $_SESSION['user'] = $username;

            // Redirigir al dashboard
            header('Location: ../dashboard.php'); // Ruta ajustada
            exit();
        } else {
            // Usuario o contraseña incorrectos
            echo "<script>
                    alert('Usuario o contraseña incorrectos');
                    window.location.href = '../index.php';
                  </script>";
        }
    } catch (Exception $e) {
        // Mostrar error si ocurre algo
        die("Error: " . $e->getMessage());
    }
} else {
    echo "<script>
            alert('Acceso no autorizado');
            window.location.href = '../index.php';
          </script>";
}
?>
