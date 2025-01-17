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
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <h1><i class="fas fa-chart-pie"></i> Panel de Control</h1>
            <p>Información general de los usuarios registrados.</p>
            <div class="cards-container">
                <div class="card">
                    <h2><i class="fas fa-users"></i> Total de Usuarios</h2>
                    <p>150</p>
                </div>
                <div class="card">
                    <h2><i class="fas fa-file-medical"></i> Planes Registrados</h2>
                    <p>Plan A, B, C</p>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="userChart"></canvas>
            </div>
        </main>
    </div>

    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'doughnut', 
            data: {
                labels: ['Plan A', 'Plan B', 'Plan C'],
                datasets: [{
                    data: [50, 70, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</body>
</html>
