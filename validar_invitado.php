<?php
session_start();

// Crear una sesión para el invitado
$_SESSION['invitado'] = true;

// Redirigir a la página exclusiva para invitados
header("Location: pagina_invitado.php");
exit();
