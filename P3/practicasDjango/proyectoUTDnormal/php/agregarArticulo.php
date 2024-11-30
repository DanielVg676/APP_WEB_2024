<?php
include 'header.php'; // Encabezado de la página.
include 'controladores/controladorAgregarArticulos.php'; // Incluye el controlador.

$categorias = obtenerCategorias(); // Obtiene las categorías disponibles.
?>

<section id="content">
    <div class="box">
        <h1>Agregar Artículo</h1>
        <form method="POST" action="controladores/controladorAgregarArticulos.php" enctype="multipart/form-data">
            <!-- Campo para el título -->
            <label for="titulo">Título del Artículo:</label><br>
            <input type="text" id="titulo" name="titulo" required style="width: 100%; padding: 10px; margin-bottom: 10px;"><br>

            <!-- Campo para la descripción -->
            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="5" required style="width: 100%; padding: 10px; margin-bottom: 10px;"></textarea><br>

            <!-- Campo para la categoría -->
            <label for="id_categoria">Categoría:</label><br>
            <select id="id_categoria" name="id_categoria" required style="width: 100%; padding: 10px; margin-bottom: 10px;">
                <option value="">Seleccione una categoría</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?php echo htmlspecialchars($categoria['id']); ?>">
                        <?php echo htmlspecialchars($categoria['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <!-- Campo para el usuario -->
            <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario" value="daniel" required style="width: 100%; padding: 10px; margin-bottom: 10px;"><br>

            <!-- Campo para la imagen -->
            <label for="imagen">Imagen:</label><br>
            <input type="file" id="imagen" name="imagen" accept="image/*" style="width: 100%; padding: 10px; margin-bottom: 10px;"><br>

            <!-- Botón para enviar el formulario -->
            <button type="submit" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px;">Agregar Artículo</button>
        </form>
    </div>
</section>

<?php
include 'footer.php'; // Pie de página.
?>
