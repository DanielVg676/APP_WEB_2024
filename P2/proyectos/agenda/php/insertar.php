<?php
 
 include_once ('sesiones.php');

 $entrar="";

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
     //Desactivar las noticias y mostrar los errores
      error_reporting(E_ALL ^ E_NOTICE);

      //1.- Conectarse a la BD
      include_once("conexion.php");
      
      //2.- Traer los datos del formulario
      $paterno=$_POST['paterno'];
      $materno=$_POST['materno'];
      $nombre=$_POST['nombre'];
      $edo_civil=$_POST['edo_civil'];
      $seguro=$_POST['seguro'];
      $pass=$_POST['pass'];
      $sexo=$_POST['sexo'];
   
      if ($seguro!=1)
         $seguro=0;
 
      //   echo "paterno: ".$paterno."<br>";
      //   echo "materno: ".$materno."<br>";
      //   echo "nombre: ".$nombre."<br>";
      //   echo "edo_civil: ".$edo_civil."<br>";
      //   echo "seguro: ".$seguro."<br>";
      //   echo "pass: ".$pass."<br>";
      //   echo "sexo: ".$sexo."<br>";
 
      //3.- crear la instruccion SQL para la consulta
      $sql="insert into empleados values(null,'$paterno','$materno','$nombre','$edo_civil','$seguro','$pass','$sexo')";
   
      //4.- Ejecutar la consulta
   
      $ejecutar_sql=$conexion->query($sql);
 
      if ($ejecutar_sql)
      {
        //  echo " <script>   
        //           alert('... Empleado Agregado Correctamente ... ');
        //        </script>";
        $entrar="insertar";
      }
      else
      {
        // echo " <script>   
        //         alert('... No fue posible agregar al empleado, verifique por favor... ');
        //         </script>";
        $entrar="noinsertar";
      }
   
    //   echo "<script>
    //            location.href='administrar.php';
    //         </script>";
 }
   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Personal</title>
</head>
<body>
    <h1 align="center">.:: A G E N D A ::.</h1>
    <a href='menu.php'>->Menú</a><br>
    <a href="administrar.php">->Administrar Empleados</a>
    <hr>
    <h2 align="center">Nuevo Empleado</h2>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table  align="center">
            <tr>
                <td><label for="paterno">Apellido Paterno:</label></td>
                <td><input type="text" placeholder="Apellido Paterno" name="paterno" autofocus required></td>
            </tr>
            <tr>
                <td><label for="materno">Apellido Materno:</label></td>
                <td><input type="text" placeholder="Apellido Materno" name="materno" required></td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" placeholder="Nombre(s)" name="nombre" required></td>
            </tr>
            <tr>
                <td><label for="edo_civil">Edo. Civil:</label></td>
                <td>
                    <select name="edo_civil" id="">
                        <option value="Soltero(a)" selected>Soltero(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="seguro">Asegurado:</label></td>
                <td><input type="checkbox" value="1" name="seguro" checked></td>
            </tr>
            <tr>
                <td><label for="pass">Palabra Secreta:</label></td>
                <td><input type="password" name="pass" maxlength="10" required></td>
            </tr>
            <tr>
                <td><label for="sexo">Sexo:</label></td>
                <td>
                    <input type="radio" name="sexo" value="Masculino" checked>
                    Masculino
                    <input type="radio" name="sexo" value="Femenino" >
                    Femenino
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="enviar" value="Enviar" >
                </td>
                <td>
                    <input type="reset" name="limpiar" value="limpiar" >
                </td>
            </tr>
        </table>
    </form>
    <hr>
   
</body>
</html>

<?php  include_once("alertas.php");  ?>


