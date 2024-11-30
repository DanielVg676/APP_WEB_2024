<?php 

include('header.php');
include('config.php');
?>

<section id="content">
       <div class="box">
            <h1>Registrarse</h1>
            <hr>
            <form action="controladores/registrar_usuario.php" method="POST">
                <label for="username"> Nombre del usuario: </label>
                <input type="text" name="username">
                <label for="email"> Dirección de correo electrónico: </label>
                <input type="email" name="email">
                <label for="nombre"> Nombre: </label>
                <input type="text" name="nombre">
                <label for="apellidos"> Apellidos: </label>
                <input type="text" name="apellidos">
                <label for="password"> Contraseña: </label>
                <input type="password" name="password">
                <label for="password2"> Contrasena(Confirmar): </label>
                <input type="password" name="password2">
                <input type="submit" value="Registrarse">
            </form>
       </div>


<?php 

include('footer.php')

?>