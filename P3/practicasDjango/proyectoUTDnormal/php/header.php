<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
    <ul>
            <li><a href="../index.php">Inicio</a></li>
            <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="verCategorias.php">Ver Categorias</a></li>
                <li><a href="verArticulos.php">Ver Articulos</a></li>
                <li><a href="controladores/logout.php">Cerrar Sesión</a></li> <!-- Enlace para cerrar sesión -->
            <?php else: ?>
                <li><a href="register.php">Registrarse</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>

</body>
</html>