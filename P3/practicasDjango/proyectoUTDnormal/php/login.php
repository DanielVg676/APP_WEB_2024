<?php 

include('header.php');
include('config.php');

?>

<section id="content">
       <div class="box">
            <h1>Iniciar Sesion</h1>
            <hr>
            <form action="controladores/controlador_login.php" method="POST">
                <label for="username"> Nombre del usuario: </label>
                <input type="text" name="username">
                <label for="password"> Contraseña: </label>
                <input type="password" name="password">
                <input type="submit" value="Iniciar Sesion">
            </form>
       </div>


<?php 

include('footer.php')

?>