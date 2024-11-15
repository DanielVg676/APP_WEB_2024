<?php

  //1.- Conectarme a la BD 
  $servidor="127.0.0.1";
  $usuario="root";
  $password="";
  $bd="agenda";

   //Conexion Orientada a Objetos
  //$conexion=new mysqli($servidor,$usuario,$password,$bd);

  //Conexion Procedural
  $conexion=mysqli_connect($servidor,$usuario,$password,$bd);
 
//   if ($conexion)
//      echo "Se conecto exitosamente ok a la BD";

?>