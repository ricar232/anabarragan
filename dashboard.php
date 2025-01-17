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
        <div class="sidebar">
            <h2>Bienvenido,</h2>
            <ul>
                <li><a href="dashboard.php">Inicio</a></li>
                <li><a href="agregar_usuario.php">Agregar Usuarios</a></li>
                <li><a href="lista_usuarios.php">Listar Usuarios</a></li>
                <li><a href="#">Configuración</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Panel de Control</h1>
            <p>Información general de los usuarios registrados.</p>

            <div class="stats">
                <div class="stat-box">
                    <h3>Total de Usuarios</h3>
                    <p>150</p>
                </div>
                <div class="stat-box">
                    <h3>Planes Registrados</h3>
                    <p>Plan A, B, C</p>
                </div>
            </div>

            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Plan A', 'Plan B', 'Plan C'],
                datasets: [{
                    data: [50, 70, 30],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56'],
                }]
            }
        });
    </script>
</body>
</html>
