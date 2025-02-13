<?php
session_start();
$_SESSION['invitado'] = true;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['consentimiento'])) {
    $_SESSION['acuerdo_aceptado'] = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Invitado</title>
    <link rel="stylesheet" href="css/guest_page.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Orbitron', sans-serif;
            background: radial-gradient(circle, #1a1a2e, #16213e, #0f3460);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            text-align: center;
        }
        .guest-container {
            width: 100%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 255, 255, 0.3);
            backdrop-filter: blur(20px);
            animation: float 5s infinite ease-in-out;
        }
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        h1 {
            font-size: 2rem;
            text-shadow: 0 0 10px cyan;
        }
        .info-box {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid cyan;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
            text-align: left;
        }
        .info-box p {
            color: cyan;
            font-size: 1rem;
        }
        button, a {
            display: block;
            width: 100%;
            max-width: 250px;
            margin: 10px auto;
            text-decoration: none;
            background: linear-gradient(90deg, cyan, blue);
            color: white;
            padding: 10px;
            border-radius: 25px;
            transition: transform 0.3s ease, background 0.3s ease;
        }
        button:hover, a:hover {
            transform: scale(1.1);
            background: linear-gradient(90deg, blue, cyan);
        }
    </style>
</head>
<body>
    <?php if (!isset($_SESSION['acuerdo_aceptado']) || !$_SESSION['acuerdo_aceptado']): ?>
        <div class="guest-container">
            <h1>Bienvenido, Invitado</h1>
            <p>Antes de continuar, por favor lea y acepte nuestro acuerdo de consentimiento.</p>
            <div class="info-box">
                <p>Al acceder a esta página, usted acepta que la compañía puede utilizar sus datos personales 
                únicamente para propósitos legales y de acuerdo con las leyes aplicables.</p>
            </div>
            <form method="POST" action="">
                <label>
                    <input type="checkbox" name="consentimiento" value="aceptado"> Acepto el acuerdo de consentimiento.
                </label>
                <button type="submit">Continuar</button>
            </form>
        </div>
    <?php else: ?>
        <div class="guest-container">
            <h1>Bienvenido, Invitado</h1>
            <p>Acceso exclusivo para invitados.</p>
            <div class="info-box">
                <h2>IGLESIA CRISTIANA</h2>
                <p><strong>Ministerio Unidos en Amor</strong></p>
                <p>📌 <strong>Domingo 12:00H</strong> - Servicio de Adoración</p>
                <p>📌 <strong>Martes 7:30pm</strong> - Oración</p>
                <p>📌 <strong>Jueves 7:30pm</strong> - Estudio Bíblico</p>
                <p><strong>📍 Ubicación:</strong> Eagle Ridge Mall, Lake Wales, FL 33859, Local #514</p>
                <p><strong>📞 Contacto:</strong></p>
                <p>Pastor: Oscar Doblado - 863-557-2610</p>
                <p>Pastora: Dunia Doblado - 863-604-0227</p>
                <p>✉️ Email: muadundee@gmail.com</p>
            </div>
            <div class="info-box">
                <h2>Nuestros Servicios</h2>
                <p>✅ Ayudamos y ofrecemos todo tipo de seguros médico y seguros de gastos finales</p>
                <p>✅ Ayudamos a guiarle con el proceso de Medicare / Medicaid</p>
                <p>✅ Ayudamos a aplicar para food stamps</p>
            </div>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    <?php endif; ?>
</body>
</html>
