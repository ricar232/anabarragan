<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Conexión a la base de datos
$host = 'localhost';
$port = 3316;
$user = 'ana';
$password = 'ana*123'; // Cambia según tu configuración
$dbname = 'login_system';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Conexión fallida: ' . $conn->connect_error);
}

// Consultar el número total de usuarios registrados
$sql_users = "SELECT COUNT(*) AS user_count FROM registered_users";
$result_users = $conn->query($sql_users);
$user_count = ($result_users->num_rows > 0) ? $result_users->fetch_assoc()['user_count'] : 0;

// Consultar el número total de citas médicas
$sql_appointments = "SELECT COUNT(*) AS appointment_count FROM appointments";
$result_appointments = $conn->query($sql_appointments);
$appointment_count = ($result_appointments->num_rows > 0) ? $result_appointments->fetch_assoc()['appointment_count'] : 0;

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

        <!-- Sección de estadísticas principales -->
        <section class="stats">
            <div class="card">
                <i class="fas fa-users"></i>
                <div class="info">
                    <h3>Usuarios Registrados</h3>
                    <p id="user-count"><?php echo $user_count; ?></p>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-calendar-alt"></i>
                <div class="info">
                    <h3>Citas Médicas</h3>
                    <p id="appointment-count"><?php echo $appointment_count; ?></p>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-chart-line"></i>
                <div class="info">
                    <h3>Actividad Reciente</h3>
                    <p>+15% esta semana</p>
                </div>
            </div>
        </section>

        <!-- Gráficos -->
        <section class="charts">
            <div class="chart-container">
                <canvas id="userChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="appointmentChart"></canvas>
            </div>
        </section>

        <!-- Opciones del dashboard -->
        <section class="dashboard-options">
            <div class="option">
                <i class="fas fa-user-plus"></i>
                <a href="register_user.php">Registrar Usuario</a>
            </div>
            <div class="option">
                <i class="fas fa-list"></i>
                <a href="view_users.php">Ver Usuarios</a>
            </div>
            <div class="option">
                <i class="fas fa-calendar-plus"></i>
                <a href="create_appointment.php">Crear Cita</a>
            </div>
        </section>
    </div>

    <script>
        // Configuración general para mejorar las gráficas
        Chart.defaults.font.family = 'Poppins';
        Chart.defaults.color = '#333';
        Chart.defaults.plugins.legend.labels.boxWidth = 20;
        Chart.defaults.plugins.legend.labels.boxHeight = 10;

        // Datos simulados (puedes conectarlos a la base de datos)
        const userData = [10, 15, 20, 30, 40, 50, 60];
        const appointmentData = [5, 7, 9, 12, 15, 20, 25];

        // Gráfico de usuarios
        const userChartCtx = document.getElementById('userChart').getContext('2d');
        new Chart(userChartCtx, {
            type: 'line',
            data: {
                labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
                datasets: [{
                    label: 'Usuarios Registrados',
                    data: userData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4, // Hace la línea curva
                    pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                    pointBorderColor: 'rgba(75, 192, 192, 1)',
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: 'rgba(255, 255, 255, 1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return ` ${context.raw} usuarios`;
                            }
                        }
                    }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: {
                        ticks: { stepSize: 10 },
                        grid: { color: 'rgba(255, 255, 255, 0.1)' }
                    }
                }
            }
        });

        // Gráfico de citas
        const appointmentChartCtx = document.getElementById('appointmentChart').getContext('2d');
        new Chart(appointmentChartCtx, {
            type: 'bar',
            data: {
                labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
                datasets: [{
                    label: 'Citas Médicas',
                    data: appointmentData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(201, 203, 207, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(201, 203, 207, 1)'
                    ],
                    borderWidth: 2,
                    hoverBorderColor: 'rgba(255, 255, 255, 1)',
                    hoverBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return ` ${context.raw} citas`;
                            }
                        }
                    }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: {
                        ticks: { stepSize: 5 },
                        grid: { color: 'rgba(255, 255, 255, 0.1)' }
                    }
                }
            }
        });
    </script>
</body>
</html>
