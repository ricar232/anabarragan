<?php
// Verificar si hay un mensaje en la URL
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="css/agregar_usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="title"><i class="fas fa-user-plus"></i> Registrar Usuario</h1>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if ($mensaje === 'exito'): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> ¡Usuario registrado exitosamente!
            </div>
        <?php elseif ($mensaje === 'error'): ?>
            <div class="alert alert-danger">
                <i class="fas fa-times-circle"></i> Ocurrió un error al registrar el usuario. Por favor, inténtelo de nuevo.
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form class="form-container" action="registrar_usuario.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre y Apellidos</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre y apellidos" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" placeholder="Teléfono">
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="Correo electrónico">
            </div>
            <div class="form-group">
                <label for="seguro_social">Seguro Social</label>
                <input type="text" id="seguro_social" name="seguro_social" placeholder="Seguro Social">
            </div>
            <div class="form-group">
                <label for="medicare">Medicare</label>
                <input type="text" id="medicare" name="medicare" placeholder="Medicare">
            </div>
            <div class="form-group">
                <label for="medicaid">Medicaid</label>
                <input type="text" id="medicaid" name="medicaid" placeholder="Medicaid">
            </div>
            <div class="form-group">
                <label for="dr_primario">Nombre del Dr. Primario</label>
                <input type="text" id="dr_primario" name="dr_primario" placeholder="Dr. Primario">
            </div>
            <div class="form-group">
                <label for="id_pcp">ID PCP</label>
                <input type="text" id="id_pcp" name="id_pcp" placeholder="ID PCP">
            </div>
            <div class="form-group">
                <label for="npi">NPI</label>
                <input type="text" id="npi" name="npi" placeholder="NPI">
            </div>
            <div class="form-group">
                <label for="plan_medico">Plan Médico</label>
                <input type="text" id="plan_medico" name="plan_medico" placeholder="Plan Médico">
            </div>
            <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Registrar Usuario</button>
        </form>
        <a href="dashboard.php" class="btn-back"><i class="fas fa-arrow-left"></i> Volver al Dashboard</a>
    </div>

    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</body>
</html>
