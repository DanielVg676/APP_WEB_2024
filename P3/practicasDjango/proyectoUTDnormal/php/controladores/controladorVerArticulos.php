<?php
function obtenerArticulos() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    include '../config.php'; 
    $db = new conn();
    $conn = $db->connect(); 

    $query = "
        SELECT 
            a.titulo, 
            a.imagen, 
            a.descripcion, 
            c.nombre AS categoria, 
            a.usuario, 
            a.creado, 
            a.hora
        FROM 
            articulos a
        LEFT JOIN 
            categorias c ON a.id_categoria = c.id";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
