<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Conexión a la base de datos
require_once 'php/conexion.php'; // Mueve la conexión a un archivo separado

// Obtener datos del dashboard
$sql_users = "SELECT COUNT(*) AS user_count FROM registered_users";
$sql_appointments = "SELECT COUNT(*) AS appointment_count FROM appointments";

$user_count = $conn->query($sql_users)->fetch_assoc()['user_count'] ?? 0;
$appointment_count = $conn->query($sql_appointments)->fetch_assoc()['appointment_count'] ?? 0;

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <!-- Encabezado -->
        <header>
            <h1>Bienvenido, <span><?php echo htmlspecialchars($_SESSION['user']); ?></span>!</h1>
            <a href="php/logout.php" class="logout-btn">Cerrar Sesión</a>
        </header>

        <!-- Sección de estadísticas -->
        <section class="stats">
            <div class="card">
                <i class="fas fa-users"></i>
                <div>
                    <h3>Usuarios Registrados</h3>
                    <p><?php echo $user_count; ?></p>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-calendar-alt"></i>
                <div>
                    <h3>Citas Médicas</h3>
                    <p><?php echo $appointment_count; ?></p>
                </div>
            </div>
        </section>

        <!-- Gráficos -->
        <section class="charts">
            <canvas id="userChart"></canvas>
            <canvas id="appointmentChart"></canvas>
        </section>
    </div>

    <script>
        const userData = [<?php echo implode(',', range(1, $user_count)); ?>];
        const appointmentData = [<?php echo implode(',', range(1, $appointment_count)); ?>];

        // Configurar gráfico de usuarios
        new Chart(document.getElementById('userChart'), {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo'],
                datasets: [{
                    label: 'Usuarios Registrados',
                    data: userData,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.3,
                }]
            }
        });

        // Configurar gráfico de citas
        new Chart(document.getElementById('appointmentChart'), {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo'],
                datasets: [{
                    label: 'Citas Médicas',
                    data: appointmentData,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                }]
            }
        });
    </script>
</body>
</html>
