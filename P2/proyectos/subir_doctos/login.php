<?php
  session_start();
  if (isset($_SESSION)) {
    session_destroy();
  }
 

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $us=$_POST['nombre'];
    $ps=$_POST['pass'];

    include_once("conectar.php");

    $consulta="select username, password, privilegio from usuarios where username='$us' and password='$ps'";
    //ejecutar la consulta
    $resultado=$con->query($consulta);

    if($resultado->num_rows>0)
    {
       if ($fila=$resultado->fetch_assoc())
       {
        $priv=$fila['privilegio'];

        session_start();
        $_SESSION['user']=$us;
        $_SESSION['pass']=$ps;
        $_SESSION['priv']=$priv;
        
        if ($priv=="admin")
        {
          echo "<script> alert('Inicio de Sesion, - B I E N V E N I D O - $us ');
                         location.href='subir_file.php'; 
                </script> ";
        } 
        elseif($priv=="estandar")
        {
          echo "<script> alert('Inicio de Sesion, - B I E N V E N I D O - $us');
                         location.href='visualizar_file.php'; 
                </script> ";
        }
       
          
       }

    }
    else
     {
       echo "<script>
              window.alert('Usuario y/o Contraseña incorrectas, por favor verifique ... ');
              window.location.href='login.php';
            </script> ";   
     }
    
   
    
     
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">	
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>LOGIN DE ACCESO</title>

  </head>
  <body>
  	 <h3 align="center"> ACCESO AL SISTEMA "GESTION ARCHIVOS" </h3>
  	<hr>
      <center>
        <img src="usua.png" width="25%" height="25%">
      </center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <table align="center">
             <tr>
               <td>Usuario: </td>
               <td><input type="text" name="nombre"  required ></td>
             </tr>
             <tr>
               <td>Contraseña: </td>
               <td><input type="password" name="pass" required ></td>
             </tr>
             <tr>
               <td><input type="submit" name="enviar" value="ENTRAR" ></td>
               <td><input type="reset" name="borrar" value="BORRAR" ></td>
             </tr>
          </table>
        </form>
    <hr>
  </body>
</html>