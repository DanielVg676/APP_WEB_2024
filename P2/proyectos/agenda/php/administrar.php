<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

<script >
		function confirm_click()
		{
		    //return confirm("¿Está seguro que desea eliminar este registro?");
            

            return   Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Registro eliminado con Exito',
                  showConfirmButton: true,
                  timer: 10000
                  })
            
		}
    

</script>

<?php
   include_once ('sesiones.php');
   
   include_once('conexion.php');

   $sql="select * from empleados";

   $ejecucion_sql=$conexion->query($sql);
   
   //obtener el numero de registros 
   $num_filas=$ejecucion_sql->num_rows;

   echo "<h1 align='center'>.:: A G E N D A ::.</h1>";
   echo "<a href='menu.php'>->Menú</a><br>";
   echo "<a href='insertar.php'>->Nuevo Empleado</a>";
   echo "<hr>";
   echo "<h2 align='center'>Empleados</h2>";
   echo "<hr>";
   echo "<table align='center' border=1>";
    echo "<thead>";                  
    echo "<th>No.</th>";
    echo "<th>Apellido Paterno</th>"; 
    echo "<th>Apellido Materno</th>"; 
    echo "<th>Nombre(s)</th>"; 
    echo "<th>Estado Civil</th>"; 
    echo "<th>Seguro</th>"; 
    echo "<th>Palabra Secreta</th>"; 
    echo "<th>Sexo</th>"; 
    echo "<th colspan='2'>Acciones</th>";
    echo "</thead>";
                        
    while ($fila=$ejecucion_sql->fetch_assoc())
    {
    echo "<tr>";
    echo "<td>".$fila['id']."</td>"; 
    echo "<td>".$fila['paterno']."</td>"; 
    echo "<td>".$fila['materno']."</td>";
    echo "<td>".$fila['nombre']."</td>"; 
    echo "<td>".$fila['edo_civil']."</td>"; 
    if ($fila['seguro']==1) 
        echo "<td>Si tiene seguro</td>";    
    else  
        echo "<td>No tiene seguro</td>";  
    echo "<td>".$fila['pass']."</td>";  
    echo "<td>".$fila['sexo']."</td>";   
    echo "<td><a href='actualizar.php?id=".$fila['id']."'>ACTUALIZAR</a></td>";       
    //echo "<td><a href='eliminar.php?id=".$fila['id']."' onclick='confirm_click();'>ELIMINAR</a></td>";   
    echo "<td><a href='eliminar.php?id=".$fila['id']."' onclick='return confirm_click();'>ELIMINAR</a></td>";     
    echo "</tr>";                      
    }

    echo "</table>";
    echo "<hr>";

    echo "<h3 align='center'>Registros:".$num_filas."</h3>";

    


?>

