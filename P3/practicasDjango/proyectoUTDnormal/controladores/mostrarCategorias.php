<?php
function obtenerCategorias() {
    include 'config.php'; 
    $db = new conn();
    $conn = $db->connect();

    $query = "
        SELECT 
            nombre, 
            descripcion, 
            creado,
            hora
        FROM 
            categorias";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
