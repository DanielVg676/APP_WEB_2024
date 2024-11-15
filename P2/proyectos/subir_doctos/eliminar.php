<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   
   <meta charset="utf-8">
	<title>Eliminar</title>
</head>

<?php 
	include_once("conectar.php");

	$folio = $_GET['folio'];

	$consulta="select nom_archivo from info_docto where folio='$folio'";

	$resultado=$con->query($consulta);

	if ($fila =$resultado->fetch_assoc())
		{
			//funcion para subir el archivo al servidor
            // $archivo_upload=move_uploaded_file ($_FILES['archivo']['tmp_name'], "files/".$nom_file);

			$borrar_file=unlink("files/".$fila['nom_archivo']);

			$consulta="delete from info_docto WHERE folio='$folio'";
			$resultado=$con->query($consulta);
			
			if ($resultado) 
				{
					echo "<script> alert('Registro eliminado correctamente'); </script> ";
				}
				else 
				{
					echo "<script> alert('Error fallo la eliminación, verifique ...'); </script> ";
				}
				echo "<script> location.href='visualizar_file.php'; </script> ";

		}


	
	
	

	
	
	

	

	
?>