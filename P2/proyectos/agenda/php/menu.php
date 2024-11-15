<?php
   include_once ('sesiones.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Mí página Web</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=3,minimum-scale=1">
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
       <div align="center">
           <h1>.:: Empleados::.</h1>
           <hr>
           
           <a class="enlace_menu"  href="insertar.php">Nuevo</a>
           <a class="enlace_menu"  href="administrar.php">Administrar</a>
           <a class="enlace_menu"  href="login.php">Cerrar Sesión <?php echo $us ?></a>
           <hr>
        </div>
       
    </body>
</html>