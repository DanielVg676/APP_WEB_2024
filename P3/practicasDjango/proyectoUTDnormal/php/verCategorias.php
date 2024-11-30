<?php
include 'header.php';
include '../controladores/mostrarCategorias.php';
$categorias = obtenerCategorias();
?>
<section id="content">
   <div class="box">
        <h1>Categorias</h1>
        <br>
        <div style="text-align: left; margin-bottom: 20px;">
            <!-- Botón para agregar una nueva categoría -->
            <a href="agregarCategoria.php" class="button" style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; margin-right: 10px;">Agregar Categoría</a>
            <!-- Botón para agregar un nuevo artículo -->
            <a href="agregarArticulo.php" class="button" style="padding: 10px 20px; background-color: #28A745; color: white; text-decoration: none; border-radius: 5px;">Agregar Artículo</a>
        </div>
        <hr>
        <?php if (!empty($categorias)): ?>
            <h1 align="center">Listado</h1>
            <hr>
            <?php foreach ($categorias as $categoria): ?>
                <article class="article-item">
                    <div class="data">
                        <h2><?php echo htmlspecialchars($categoria['nombre']); ?></h2>
                        <p>Descripción: <?php echo htmlspecialchars($categoria['descripcion']); ?></p>
                        <span class="date"><?php echo htmlspecialchars($categoria['creado']. ' ' . $categoria['hora']); ?></span>
                        <hr>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay categorías para mostrar.</p>
        <?php endif; ?>
   </div>
</section>
<?php
include 'footer.php';
?>
</body>
</html>
