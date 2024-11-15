<?php
  session_start();
	if (!isset($_SESSION['user'])) {
		header("location: login.php");
	}
	else {
		$us=$_SESSION['user'];
    $priv=$_SESSION['priv'];
  }
  
          include_once("conectar.php");
 
          $consulta="select folio,nom_archivo,size_arch,ruta,extension from info_docto";
          $resultado=$con->query($consulta);  

          //echo "<body onload='window.print()'>";
          echo "<br><h3 align=center> Registros de los Archivos en el Sistema</h3>";
          echo "<hr>";
          echo "<table align=center border=1>";
          echo "<tr>";
          echo "<td>No.</td>";
          echo "<td>Archivo</td>";   
          echo "<td>Tamaño</td>";
          echo "<td>Ruta</td>";
          echo "<td>Extensión</td>";
          if ($priv=="admin")
            echo "<td>Acciones</td>";
          echo "</tr>";

          
        
         while ($fila=$resultado->fetch_assoc()) 
            {
              echo "<tr>";
              echo "<td>".$fila['folio'] ."</td><td>".$fila['nom_archivo']."</td><td>".$fila['size_arch']."</td>";
              echo "<td><a href = ".$fila['ruta']." target='_blank'>".$fila['ruta']."</a></td>";
              echo "<td>".$fila['extension'] ."</td>";
              if ($priv=="admin")
                 echo "<td><a href = eliminar.php?folio=".$fila['folio'].">Eliminar</a></td>";
              echo "</tr>";
            }
            echo "</table>";
            echo "<hr>";
            $numregistros=$resultado->num_rows;
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";

            //echo "<body onload='window.print()'>";

            if ($priv=="admin")
              echo "<a href='subir_file.php'><h3 align=center >Volver</h3></a>";
            else
              echo "<a href='login.php'><h3 align=center >Cerrar sesión de $us </h3></a>";
            
   
?>

