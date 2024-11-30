<?php
include __DIR__ . '/../config.php'; // Ruta absoluta basada en el directorio actual.

function obtenerCategorias() {
    try {
        $db = new conn(); // Instancia la clase `conn`.
        $conexion = $db->connect(); // Conexión a la base de datos.

        $query = "SELECT id, nombre FROM categorias"; // Consulta para obtener las categorías.
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna un arreglo de categorías.
    } catch (PDOException $e) {
        error_log("Error al obtener las categorías: " . $e->getMessage());
        return []; // Retorna un arreglo vacío en caso de error.
    }
}


function agregarArticulo($titulo, $descripcion, $id_categoria, $usuario, $imagen) {
    try {
        $db = new conn(); // Instancia la clase `conn`.
        $conexion = $db->connect(); // Conexión a la base de datos.

        $query = "INSERT INTO articulos (titulo, descripcion, id_categoria, usuario, imagen, creado, hora, actualizado) 
                  VALUES (:titulo, :descripcion, :id_categoria, :usuario, :imagen, NOW(), TIME(NOW()), NOW())";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT); // Ligar a la categoría.
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_LOB); // Almacena la imagen como BLOB.
        $stmt->execute();

        return true; // Retorna true si la inserción fue exitosa.
    } catch (PDOException $e) {
        error_log("Error al agregar el artículo: " . $e->getMessage());
        return false; // Retorna false si ocurre un error.
    }
}

// Procesar el formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $id_categoria = intval($_POST['id_categoria'] ?? 0);
    $usuario = trim($_POST['usuario'] ?? '');
    $imagen = null;

    // Procesar la imagen si fue enviada.
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    }

    // Validaciones básicas.
    if (empty($titulo)) {
        echo "<script>alert('El título del artículo es obligatorio.'); window.history.back();</script>";
        exit;
    } elseif (empty($descripcion)) {
        echo "<script>alert('La descripción del artículo es obligatoria.'); window.history.back();</script>";
        exit;
    } elseif ($id_categoria <= 0) {
        echo "<script>alert('La categoría seleccionada no es válida.'); window.history.back();</script>";
        exit;
    } elseif (empty($usuario)) {
        echo "<script>alert('El nombre de usuario es obligatorio.'); window.history.back();</script>";
        exit;
    } else {
        if (agregarArticulo($titulo, $descripcion, $id_categoria, $usuario, $imagen)) {
            echo "<script>
                    alert('Artículo agregado con éxito.');
                    window.location.href = '../verArticulos.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Hubo un error al agregar el artículo.'); window.history.back();</script>";
            exit;
        }
    }
}
?>
