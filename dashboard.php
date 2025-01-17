<?php
session_start();

// Verificar si la sesión está iniciada, si no, redirigir al login
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-hospital-user"></i>
                <span>Admin Panel</span>
            </div>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="agregar_usuario.php"><i class="fas fa-user-plus"></i> Agregar Usuarios</a></li>
                <li><a href="lista_usuarios.php"><i class="fas fa-users"></i> Listar Usuarios</a></li>
                <li><a href="#"><i class="fas fa-cogs"></i> Configuración</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <h1>Panel de Control</h1>
            <p>Información general de los usuarios registrados.</p>
            <div class="dashboard-info">
                <div class="info-card">
                    <i class="fas fa-users"></i>
                    <h2>Total de Usuarios</h2>
                    <p>150</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-clipboard-list"></i>
                    <h2>Planes Registrados</h2>
                    <p>Plan A, B, C</p>
                </div>
            </div>
            <canvas id="chart" width="400" height="200"></canvas>
        </main>
    </div>
    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Plan A', 'Plan B', 'Plan C'],
                datasets: [{
                    label: 'Usuarios por Plan',
                    data: [50, 60, 40],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>
