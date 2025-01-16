<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuarios</title>
    <link rel="stylesheet" href="css/view_users.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <h1><i class="fas fa-users"></i> Lista de Usuarios</h1>
            <a href="dashboard.php" class="back-to-dashboard"><i class="fas fa-arrow-left"></i> Volver al Dashboard</a>
        </header>

        <section class="content">
            <div class="table-container">
                <h2><i class="fas fa-user-circle"></i> Usuarios Registrados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="user-table">
                        <!-- Los datos serán llenados dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="chart-container">
                <h2><i class="fas fa-chart-pie"></i> Estadísticas de Usuarios</h2>
                <canvas id="myChart"></canvas>
            </div>
        </section>
    </div>
    <script src="js/view_users.js"></script>
</body>
</html>
