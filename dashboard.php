<?php
require 'conexion.php';

$anio_actual = date('Y');

$sql_total_usuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios_registrados";
$result_total = $conn->query($sql_total_usuarios);
$total_usuarios = $result_total->fetch(PDO::FETCH_ASSOC)['total_usuarios'];

$sql_planes_activos = "SELECT plan_medico, COUNT(*) AS total FROM usuarios_registrados GROUP BY plan_medico";
$result_planes = $conn->query($sql_planes_activos);
$planes = $result_planes->fetchAll(PDO::FETCH_ASSOC);

$sql_nuevos_usuarios = "
    SELECT MONTH(fecha_nacimiento) AS mes, COUNT(*) AS total 
    FROM usuarios_registrados 
    WHERE YEAR(fecha_nacimiento) = :anio_actual 
    GROUP BY mes";
$stmt_nuevos = $conn->prepare($sql_nuevos_usuarios);
$stmt_nuevos->bindParam(':anio_actual', $anio_actual, PDO::PARAM_INT);
$stmt_nuevos->execute();
$nuevos_datos = $stmt_nuevos->fetchAll(PDO::FETCH_ASSOC);

$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$valores_nuevos = array_fill(0, 12, 0);

foreach ($nuevos_datos as $dato) {
    $valores_nuevos[$dato['mes'] - 1] = $dato['total'];
}

$nombres_planes = [];
$valores_planes = [];
foreach ($planes as $plan) {
    $nombres_planes[] = $plan['plan_medico'];
    $valores_planes[] = $plan['total'];
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
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                <span>Admin Panel</span>
            </div>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="agregar_usuario.php"><i class="fas fa-user-plus"></i> Agregar Usuarios</a></li>
                <li><a href="lista_usuarios.php"><i class="fas fa-users"></i> Listar Usuarios</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header>
                <h1><i class="fas fa-chart-pie"></i> Panel de Control - Año <?php echo $anio_actual; ?></h1>
                <p>Resumen general de los datos registrados.</p>
            </header>
            <section class="info-cards">
                <div class="card">
                    <h2><i class="fas fa-users"></i> Total de Usuarios</h2>
                    <p><?php echo $total_usuarios; ?></p>
                </div>
                <div class="card">
                    <h2><i class="fas fa-file-medical"></i> Planes Activos</h2>
                    <p><?php foreach ($planes as $plan) {
                        echo $plan['plan_medico'] . " (" . $plan['total'] . "), ";
                    } ?></p>
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
        </main>
    </div>
    <script>
        const ctxLine = document.getElementById('lineChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($meses); ?>,
                datasets: [{
                    label: 'Nuevos Usuarios',
                    data: <?php echo json_encode($valores_nuevos); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'top' } } }
        });

        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nombres_planes); ?>,
                datasets: [{
                    label: 'Usuarios por Plan',
                    data: <?php echo json_encode($valores_planes); ?>,
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    borderWidth: 1
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'top' } } }
        });
    </script>
</body>
</html>
