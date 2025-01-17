<?php
session_start();
session_unset(); // Limpia todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir al login después de cerrar la sesión
header('Location: index.php');
exit();
?>
