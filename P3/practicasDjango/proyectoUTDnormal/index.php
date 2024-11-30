<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Django Proyecto UTD</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>

<body>
    <header>
        <div id="logotipo">
            <img src="img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
                <li><a href="php/acercade.php">Acerca de</a></li>
                <li><a href="php/mision.php">Misión</a></li>
                <li><a href="php/vision.php">Visión</a></li>
                <li><a href="php/verCategorias.php">Ver Categorias</a></li>
                <li><a href="php/verArticulos.php">Ver Articulos</a></li>
                <li><a href="php/controladores/logout.php">Cerrar Sesión</a></li> <!-- Enlace para cerrar sesión -->
            <?php else: ?>
                <li><a href="php/register.php">Registrarse</a></li>
                <li><a href="php/login.php">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Inicio</h1>
            <hr>
            <p>.:: ¡Bienvenido a mi página de Inicio! ::.</p>
            <br>
            <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])): ?>
                <p><?php echo $_SESSION['email']; ?></p>
            <?php else: ?>
                <p>No se ha iniciado sesión, porfavor dirijete a <a href="php/login.php" style="color: green;">Iniciar Sesion</a></p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>Django con Dagonline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>

</html>