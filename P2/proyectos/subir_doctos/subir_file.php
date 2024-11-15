<?php
  
  

  session_start();
  if (!isset($_SESSION['user'])) 
    {
		header("location: login.php");
	}
  else 
    {
      $us=$_SESSION['user'];
      $ps=$_SESSION['pass'];
      $priv=$_SESSION['priv'];
    }
    
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  { 
   
    if ($_FILES['archivo']['name'] != "" && $_FILES['archivo']['size'] != 0)
      { 
        
        $nom_file=$_FILES['archivo']['name'];
        $size_arch=$_FILES['archivo']['size'];
        $extencion_arch=pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
        $directorio=pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME);
        $ruta_file=$directorio."/files/".$nom_file;

        // echo "directorio:  ".$directorio."<br>";
        // echo "ruta_file:  ".$ruta_file."<br>";
        // echo "FILES[archivo][tmp_name]:  ".$_FILES['archivo']['tmp_name']."<br>";
        // echo "files/".$nom_file."<br>";
           
        if ( ($extencion_arch=="doc") || ($extencion_arch=="docx") || ($extencion_arch=="pdf") || ($extencion_arch=="xls") || ($extencion_arch=="xlsx"))
            { 
          
              //funcion para subir el archivo al servidor
              $archivo_upload=move_uploaded_file ($_FILES['archivo']['tmp_name'], "files/".$nom_file);

              if ($archivo_upload)
              {
                
                require_once("conectar.php");
                $consulta="insert into info_docto  values (null,'$nom_file', '$size_arch', '$ruta_file','$extencion_arch')";
      
                //ejecutar la consulta en mysqli procedimental
                $resultado=$con->query($consulta);

                //Enviar al control al archivo visualizar 
                if($resultado) 
                  {
                    echo "<script> alert('Archivo subido con Exito y Registro agregado correctamente');
                                        location.href='visualizar_file.php'; 
                          </script> ";
                  } 
                else 
                  {
                    echo "<script> alert('Error al agregar el registro, verifique por favor ...'); 
                                </script> ";
                  }

              }
              else
              {
                echo "<script> alert('No se ha podido copiar el archivo al servidor');</script>";
              }

                    
            }
          else
            {
              echo "<script> alert('Por favor verifique, SOLO SE PERMITE: ´DOC´, ´XLS´ ó ´PDF´ ');</script>";
            }
        } 
    else 
     {  
        echo "<script> alert('No se ha seleccionado un archivo para SUBIR');</script>"; 
     }  

}

//
       
?> 
    <!DOCTYPE html>
    <html>  
      <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Subir Archivos</title>
      </head>
      <body>
        <h3 align="center"> Subir Archivos</h3>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
          <table align="center">
            <tr>
              <td>Archivo a descargar: </td>
              <td>
                <input name="archivo" type="file" size="70" maxlength="70">  
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="enviar" value="Subir">
                  <input type="reset" name="borrar" value="Cancelar">
              </td>
            </tr>
          </table>
            <input type="hidden" name="us" value="<? echo $us; ?>">
            <input type="hidden" name="ps" value="<? echo $ps; ?>">
        </form>
        <hr>  
        <a href='visualizar_file.php'><h3 align=center >Ver los Archivos</h3></a>
        <a href='login.php'><h3 align=center >Cerrar sesión de <?php echo $us ?></h3></a>
      </body>
   </html> 


   
  
       
