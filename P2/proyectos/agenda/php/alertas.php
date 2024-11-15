<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="../js/alertas.js"></script>

<?php
   if ($entrar=="acceso"){  ?>
      <script> acceso() </script>  
<?php } elseif($entrar=="noacceso") {?>
      <script> noacceso() </script>
<?php } elseif($entrar=="insertar") {?>
      <script> insertar() </script>   
<?php } elseif($entrar=="noinsertar") {?>
      <script> noinsertar() </script>  
<?php } elseif($entrar=="eliminar") {?>
      <script>
         //alert('Estoy en eliminar de alertas.php');
         Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Registro eliminado con Exito   en alertas.php',
                  showConfirmButton: false,
                  timer:2000
                  }).then(function(){
                  //location.href= 'administrar.php';
                  });

     </script>    
<?php } elseif($entrar=="actualizar") {?>
      <script>actualizar()</script>  
<?php } elseif($entrar=="noactualizar") {?>
      <script>noactualizar()</script>                 
<?php } ?>
  







