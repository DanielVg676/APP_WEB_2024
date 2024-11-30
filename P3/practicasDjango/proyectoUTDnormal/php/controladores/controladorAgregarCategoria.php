<?php
include 'config.php'; // Incluye correctamente el archivo config.php.

function agregarCategoria($nombre, $descripcion) {
    try {
        $db = new conn(); // Instancia la clase `conn`.
        $conexion = $db->connect(); // Conexión a la base de datos.

        $query = "INSERT INTO categorias (nombre, descripcion, creado, actualizado, hora) 
                  VALUES (:nombre, :descripcion, NOW(), NOW(), TIME(NOW()))";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->execute();

        return true; // Retorna true si se inserta correctamente.
    } catch (PDOException $e) {
        error_log("Error al agregar la categoría: " . $e->getMessage());
        return false; // Retorna false si ocurre un error.
    }
}

// Procesar el formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    // Validaciones básicas.
    if (empty($nombre)) {
        $error = "El nombre de la categoría es obligatorio.";
        echo "<script>alert('$error'); window.history.back();</script>";
        exit;
    } elseif (empty($descripcion)) {
        $error = "La descripción de la categoría es obligatoria.";
        echo "<script>alert('$error'); window.history.back();</script>";
        exit;
    } else {
        if (agregarCategoria($nombre, $descripcion)) {
            echo "<script>
                    alert('Categoría agregada con éxito');
                    window.location.href = 'verCategorias.php';
                  </script>";
            exit;
        } else {
            $error = "Hubo un error al agregar la categoría.";
            echo "<script>alert('$error'); window.history.back();</script>";
            exit;
        }
    }
}
?>
