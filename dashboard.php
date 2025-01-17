<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Bienvenido,</h2>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="agregar_usuario.php">Agregar Usuarios</a></li>
                <li><a href="lista_usuarios.php">Listar Usuarios</a></li>
                <li><a href="#">Configuración</a></li>
                <li><a href="#">Cerrar sesión</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <h1>Panel de Control</h1>
            <p>Información general de los usuarios registrados.</p>
            <div class="cards-container">
                <div class="card">
                    <h2>Total de Usuarios</h2>
                    <p>150</p>
                </div>
                <div class="card">
                    <h2>Planes Registrados</h2>
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
            type: 'bar', // Cambiamos a gráfica de barras
            data: {
                labels: ['Plan A', 'Plan B', 'Plan C'],
                datasets: [{
                    label: 'Usuarios por Plan',
                    data: [50, 70, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true,
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
