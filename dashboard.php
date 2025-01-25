<?php
require 'conexion.php';

// Código existente para gráficos y estadísticas
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$sql = "SELECT MONTH(fecha_registro) AS mes, COUNT(*) AS total FROM usuarios_registrados WHERE YEAR(fecha_registro) = YEAR(CURDATE()) GROUP BY mes";
$result = $conn->query($sql);
$usuariosPorMes = array_fill(0, 12, 0);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $usuariosPorMes[$row['mes'] - 1] = $row['total'];
}
$sql_planes = "SELECT plan_medico, COUNT(*) AS total FROM usuarios_registrados GROUP BY plan_medico";
$result_planes = $conn->query($sql_planes);
$planes = [];
while ($row = $result_planes->fetch(PDO::FETCH_ASSOC)) {
    $planes[] = [
        'plan' => $row['plan_medico'],
        'total' => $row['total']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Moderno</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Barra lateral -->
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                <span>Admin Panel</span>
            </div>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="dashboard.php?seccion=agregar"><i class="fas fa-user-plus"></i> Agregar Usuarios</a></li>
                <li><a href="dashboard.php?seccion=listar"><i class="fas fa-users"></i> Listar Usuarios</a></li>
                <li><a href="dashboard.php?seccion=configuracion"><i class="fas fa-cogs"></i> Configuración</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </aside>

        <!-- Contenido principal -->
        <main class="main-content">
            <?php
            if (isset($_GET['seccion'])) {
                $seccion = $_GET['seccion'];

                // Agregar usuarios
                if ($seccion === 'agregar') {
                    include 'agregar_usuario.php';
                }
                // Listar usuarios
                elseif ($seccion === 'listar') {
                    include 'lista_usuarios.php';
                }
                // Configuración (Cambiar contraseña o eliminar usuarios)
                elseif ($seccion === 'configuracion') {
                    include 'configuracion.php';
                } else {
                    echo "<h2>Sección no encontrada</h2>";
                }
            } else {
                ?>
                <header>
                    <h1><i class="fas fa-chart-pie"></i> Seguro Ana Barragan <?php echo date('Y'); ?></h1>
                    <p>Resumen general de los datos registrados.</p>
                </header>

                <section class="info-cards">
                    <div class="card">
                        <h2><i class="fas fa-users"></i> Total de Usuarios</h2>
                        <p><?php echo array_sum($usuariosPorMes); ?></p>
                    </div>
                    <div class="card">
                        <h2><i class="fas fa-file-medical"></i> Planes Activos</h2>
                        <p>
                            <?php
                            foreach ($planes as $plan) {
                                echo htmlspecialchars($plan['plan']) . " ({$plan['total']}), ";
                            }
                            ?>
                        </p>
                    </div>
                </section>

                <section class="charts">
                    <div class="chart-container">
                        <canvas id="lineChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <canvas id="barChart"></canvas>
                    </div>
                </section>
                <?php
            }
            ?>
        </main>
    </div>

    <script>
        // Datos dinámicos desde PHP
        const usuariosPorMes = <?php echo json_encode($usuariosPorMes); ?>;
        const planes = <?php echo json_encode($planes); ?>;

        // Configuración para la gráfica de líneas
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Nuevos Usuarios',
                    data: usuariosPorMes,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'top' } }
            }
        });

        // Configuración para la gráfica de barras
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: planes.map(plan => plan.plan),
                datasets: [{
                    label: 'Usuarios por Plan',
                    data: planes.map(plan => plan.total),
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
                plugins: { legend: { position: 'top' } }
            }
        });
    </script>
</body>
</html>
