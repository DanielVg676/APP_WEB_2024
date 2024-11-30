<?php
include 'header.php';
include '../controladores/mostrarArticulos.php';
$articulos = obtenerArticulos();
?>

<section id="content">
    <div class="box">
        <h1>Artículos</h1>
        <hr>
        <p>Artículos en el sistema</p>
        <hr>
        <h1 align="center">Listado</h1>
        <div style="text-align: left; margin-bottom: 20px;">
            <!-- Botón para agregar un nuevo artículo -->
            <a href="agregarArticulo.php" class="button" style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">Agregar Artículo</a>
        </div>
        <br>
        <hr>
        <?php if (!empty($articulos)): ?>
            <?php foreach ($articulos as $articulo): ?>
                <article class="article-item">
                    <?php if (!empty($articulo['imagen'])): ?>
                        <br>
                        <div>
                            <img width="400px" height="300px" src="data:image/jpeg;base64,<?php echo base64_encode($articulo['imagen']); ?>" alt="<?php echo htmlspecialchars($articulo['titulo']); ?>" />
                        </div>
                    <?php endif; ?>
                    <div class="data">
                        <h2><?php echo htmlspecialchars($articulo['titulo']); ?></h2>
                        <p>Descripción: <?php echo htmlspecialchars($articulo['descripcion']); ?></p>
                        <p>Categoría: <?php echo htmlspecialchars($articulo['categoria'] ?? 'Sin categoría'); ?></p>
                        <span class="date">
                            <?php echo htmlspecialchars($articulo['usuario']); ?>
                            <br />
                            <?php echo htmlspecialchars($articulo['creado'] . ' ' . $articulo['hora']); ?>
                        </span>
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay artículos para mostrar.</p>
        <?php endif; ?>
    </div>
</section>
<?php
include 'footer.php';
?>
</body>
</html>
