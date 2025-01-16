<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="css/register_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-card">
            <a href="dashboard.php" class="back-to-dashboard">
                <i class="fas fa-arrow-left"></i> Volver al Dashboard
            </a>
            <h2 class="form-title"><i class="fas fa-user-plus"></i> Registrar Usuario</h2>
            <form action="process_user.php" method="POST">
                <!-- Campos del formulario -->
                <div class="form-group">
                    <label for="full-name"><i class="fas fa-user"></i> Nombre y Apellidos</label>
                    <input type="text" id="full-name" name="full_name" placeholder="Nombre completo" required>
                </div>
                <div class="form-group">
                    <label for="birth-date"><i class="fas fa-calendar"></i> Fecha de Nacimiento</label>
                    <input type="date" id="birth-date" name="birth_date" required>
                </div>
                <div class="form-group">
                    <label for="address"><i class="fas fa-map-marker-alt"></i> Dirección</label>
                    <input type="text" id="address" name="address" placeholder="Dirección completa" required>
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone-alt"></i> Teléfono</label>
                    <input type="tel" id="phone" name="phone" placeholder="Teléfono" required>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">
                    <label for="social-security"><i class="fas fa-id-card"></i> Seguro Social</label>
                    <input type="text" id="social-security" name="social_security" placeholder="Número de Seguro Social" required>
                </div>
                <div class="form-group">
                    <label for="medicare"><i class="fas fa-heartbeat"></i> Medicare</label>
                    <input type="text" id="medicare" name="medicare" placeholder="Número de Medicare" required>
                </div>
                <div class="form-group">
                    <label for="medicaid"><i class="fas fa-notes-medical"></i> Medicaid</label>
                    <input type="text" id="medicaid" name="medicaid" placeholder="Número de Medicaid" required>
                </div>
                <div class="form-group">
                    <label for="primary-doctor"><i class="fas fa-user-md"></i> Doctor Primario</label>
                    <input type="text" id="primary-doctor" name="primary_doctor" placeholder="Nombre del doctor" required>
                </div>
                <div class="form-group">
                    <label for="pcp-id"><i class="fas fa-id-badge"></i> ID PCP</label>
                    <input type="text" id="pcp-id" name="pcp_id" placeholder="ID PCP" required>
                </div>
                <div class="form-group">
                    <label for="npi"><i class="fas fa-user-tag"></i> NPI</label>
                    <input type="text" id="npi" name="npi" placeholder="NPI del doctor" required>
                </div>
                <div class="form-group">
                    <label for="medical-plan"><i class="fas fa-file-alt"></i> Plan Médico</label>
                    <input type="text" id="medical-plan" name="medical_plan" placeholder="Plan médico" required>
                </div>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Registrar Usuario
                </button>
            </form>
        </div>
    </div>
</body>
</html>
