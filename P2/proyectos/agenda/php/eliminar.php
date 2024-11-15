
<?php
   //eliminar un registro de la BD
   include_once ('sesiones.php');

   include_once('conexion.php');

   $entrar="";

   $id=$_REQUEST['id'];


   $sql="delete from empleados where id = '$id'";

   $ejecutar_sql=$conexion->query($sql);

   if ($ejecutar_sql)
   {
      // echo " <script>   
      //         alert('... Empleado Eliminado Correctamente ... ');
      //       </script>";
     $entrar="eliminar";
   }
   else
   {
   //  echo " <script>   
   //           alert('... No fue posible eliminar al empleado, verifique por favor... ');
   //        </script>";
      $entrar="noeliminar";
   }

   echo "<script>
            location.href='administrar.php';
        </script>";

   include_once("alertas.php");

?>

