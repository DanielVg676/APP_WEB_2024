<?php
include 'header.php';
include 'controladores/controladorAgregarCategoria.php'; // Controlador para procesar el formulario.
?>

<section id="content">
    <div class="box">
        <h1>Agregar Categoría</h1>
        <form method="POST" action="">
            <!-- Campo para el nombre de la categoría -->
            <label for="nombre">Nombre de la Categoría:</label><br>
            <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 10px; margin-bottom: 10px;"><br>

            <!-- Campo para la descripción -->
            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="5" required style="width: 100%; padding: 10px; margin-bottom: 10px;"></textarea><br>

            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <!-- Botón para enviar el formulario -->
            <button type="submit" style="padding: 10px 20px; background-color: green; color: white; border: none; border-radius: 5px;">Guardar Categoría</button>
        </form>
    </div>
</section>

<?php
include 'footer.php';
?>
