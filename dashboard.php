<!DOCTYPE html>
<html lang="es">
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
            <nav>
                <ul>
                    <li><a href="dashboard.php">Inicio</a></li>
                    <li><a href="agregar_usuario.php">Agregar Usuarios</a></li>
                    <li><a href="lista_usuarios.php">Listar Usuarios</a></li>
                    <li><a href="configuracion.php">Configuración</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <h1>Panel de Control</h1>
            <p>Información general de los usuarios registrados.</p>

            <div class="stats-container">
                <div class="stat-card">
                    <h3>Total de Usuarios</h3>
                    <p id="total-usuarios">0</p>
                </div>
            </div>

            <div class="charts-container">
                <div class="chart">
                    <canvas id="pieChart"></canvas>
                </div>
                <div class="chart">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Obtener datos dinámicos del servidor (simulado aquí con datos estáticos)
        const totalUsuarios = 150; // Esto debería venir de una consulta a la base de datos
        const usuariosPorPlan = {
            "Plan A": 50,
            "Plan B": 30,
            "Plan C": 70
        };
        const registrosPorMes = {
            "Enero": 10,
            "Febrero": 15,
            "Marzo": 20,
            "Abril": 25,
            "Mayo": 30
        };

        // Actualizar estadísticas
        document.getElementById('total-usuarios').innerText = totalUsuarios;

        // Configurar gráfica circular
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: Object.keys(usuariosPorPlan),
                datasets: [{
                    data: Object.values(usuariosPorPlan),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });

        // Configurar gráfica de barras
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: Object.keys(registrosPorMes),
                datasets: [{
                    label: 'Registros por Mes',
                    data: Object.values(registrosPorMes),
                    backgroundColor: '#36A2EB'
                }]
            },
            options: {
                responsive: true,
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
