



<?php

   

    session_start();

    //verificar que existan las variables en caso contrario se destruye la sesion
    if (isset($_SESSION))
    {
       session_destroy();
    }    

    include_once("burbujas.php");

    $entrar="";

   if ($_SERVER["REQUEST_METHOD"]=="POST")
   {

        $us=$_POST['nombre'];
        $ps=$_POST['pass'];

        include_once("conexion.php");

        //$sql="select * from usuarios where username='$us' and password='$ps'";

        //pass encriptado AES_ENCRYPT
        $sql="select username, password, privilegio from usuarios where username='$us' and password=hex(AES_ENCRYPT('$ps','visualizarpass'))";
        
        $ejecucion_sql=mysqli_query($conexion,$sql);

        if (mysqli_num_rows($ejecucion_sql))
        {
           if ($fila=mysqli_fetch_assoc($ejecucion_sql))
           {
             $privilegio=$fila['privilegio'];

             //Iniciar sesion y se guardar las variables de sesion
             session_start();
             $_SESSION['user']=$us;
             $_SESSION['privilegio']=$privilegio;
             
             $entrar="acceso";
                       
           }
        }
        else
        {
            $entrar="noacceso"; 
        }

        
   }
   
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Acceso</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div align="center" id="contenedor">
        <h1>.:: A G E N D A ::.</h1>
        <hr>
        <h2>Acceso al Sistema</h1>
        <img src="../img/login.jpeg" alt="Login" title="Acceso al Sistema">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table align="center">
                <tr>
                    <td><label for="us">Usuario:</label></td>
                    <td><input type="text" name="nombre" id="us" autofocus required></td>
                </tr>
                <tr>
                    <td><label for="ps">Contraseña:</label></td>
                    <td><input type="password" name="pass" id="ps" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Entrar" name="entrar"></td>
                    <td><input type="reset" value="Borrar" name="borrar"></td>
                </tr>
            </table>
        </form>
        <hr>
        <div class="icon-facebook"></div>
        <div class="icon-youtube"></div>
        <div class="icon-twitter"></div>
    </div>
</body>
</html>

<?php  include_once("alertas.php");  ?>