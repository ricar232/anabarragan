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
    <div class="sidebar">
        <h2>Bienvenido,</h2>
        <ul>
            <li><i class="fas fa-home"></i> <a href="#">Inicio</a></li>
            <li><i class="fas fa-user-plus"></i> <a href="agregar_usuario.php">Agregar Usuarios</a></li>
            <li><i class="fas fa-users"></i> <a href="lista_usuarios.php">Listar Usuarios</a></li>
            <li><i class="fas fa-cog"></i> <a href="#">Configuración</a></li>
            <li><i class="fas fa-sign-out-alt"></i> <a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Panel de Control</h1>
        <p>Información general de los usuarios registrados.</p>
        <div class="info-cards">
            <div class="card">
                <h3>Total de Usuarios</h3>
                <p id="total-users">150</p>
            </div>
            <div class="card">
                <h3>Planes Registrados</h3>
                <p>Plan A, B, C</p>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="userChart"></canvas>
        </div>
    </div>

    <script>
        // Configuración del gráfico
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Plan A', 'Plan B', 'Plan C'],
                datasets: [{
                    data: [50, 70, 30], // Datos de ejemplo
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
    </script>
</body>
</html>
