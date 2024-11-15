<?php

  include_once ('sesiones.php');

  include_once('conexion.php');

  $id=$_REQUEST['id'];

  $sql="select * from empleados where id='$id'";

  $ejecucion_sql=$conexion->query($sql);

  if ($fila=$ejecucion_sql->fetch_assoc())
  {
    //me guarda el registro en el objeto $fila
  }

  $entrar="";

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $id=$_POST['id'];
    $paterno=$_POST['paterno'];
    $materno=$_POST['materno'];
    $nombre=$_POST['nombre'];
    $edo_civil=$_POST['edo_civil'];
    $seguro=$_POST['seguro'];
    $pass=$_POST['pass'];
    $sexo=$_POST['sexo'];
  
    if ($seguro!=1)
       $seguro=0;
 
 
    $sql="update empleados set paterno='$paterno', materno='$materno', nombre='$nombre', edo_civil='$edo_civil', seguro='$seguro', pass='$pass', sexo='$sexo' where id = '$id'";
 
    $ejecutar_sql=$conexion->query($sql);
 
    if ($ejecutar_sql)
    {
    //    echo " <script>   
    //            alert('... Empleado Actualizado Correctamente ... ');
    //          </script>";
       $entrar="actualizar";
    }
    else
    {
    //  echo " <script>   
    //           alert('... No fue posible actualizar al empleado, verifique por favor... ');
    //        </script>";
        $entrar="noactualizar";
    }
 
    // echo "<script>
    //          location.href='administrar.php';
    //      </script>";
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
    <h2 align="center">Actualizar Empleado</h2>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table  align="center">
            <tr>
                <td><label for="paterno">Apellido Paterno:</label></td>
                <td><input type="text" placeholder="Apellido Paterno" name="paterno" value="<?php echo $fila['paterno']  ?>" autofocus required></td>
            </tr>
            <tr>
                <td><label for="materno">Apellido Materno:</label></td>
                <td><input type="text" placeholder="Apellido Materno" name="materno" value="<?php echo $fila['materno']  ?>" required></td>
            </tr>
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><input type="text" placeholder="Nombre(s)" name="nombre" value="<?php echo $fila['nombre']  ?>" required></td>
            </tr>
            <tr>
                <td><label for="edo_civil">Edo. Civil:</label></td>
                <td>
                    <select name="edo_civil" id="">
                        <option value="<?php echo $fila['edo_civil'] ?>" selected><?php echo $fila['edo_civil'] ?></option>
                        <option value="Soltero(a)">Soltero(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="seguro">Asegurado:</label></td>
                <td><input type="checkbox" value="1" name="seguro" <?php if ($fila['seguro']==1) { ?>  checked <?php } ?> >
                </td>
            </tr>
            <tr>
                <td><label for="pass">Palabra Secreta:</label></td>
                <td><input type="password" name="pass" value="<?php echo $fila['pass']  ?>" maxlength="10"  required></td>
            </tr>
            <tr>
                <td><label for="sexo">Sexo:</label></td>
                <td>
                    <input type="radio" name="sexo" value="Masculino" <?php if ($fila['sexo']=='Masculino') { ?> checked <?php }?> >
                    Masculino
                    <input type="radio" name="sexo" value="Femenino" <?php if ($fila['sexo']=='Femenino') {  ?> checked <?php }?> >
                    Femenino
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="guardar" value="Guardar" >
                </td>
                
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $fila['id']?>">
    </form>
    <hr>
   
</body>
</html>

<?php  include_once("alertas.php");  ?>
