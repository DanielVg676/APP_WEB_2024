<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header('Content-Type: application/json; charset=utf-8');

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Por favor, complete todos los campos."]);
        exit;
    }

    try {
        $db = new conn();
        $conn = $db->connect();

        $query = "SELECT id, username, password, email FROM usuarios WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                echo json_encode(["status" => "success", "message" => "Inicio de sesión exitoso."]);
                exit;  // Asegura que no se envíe nada más
            } else {
                echo json_encode(["status" => "error", "message" => "Contraseña incorrecta."]);
                exit;
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Usuario no encontrado."]);
            exit;
        }
    } catch (PDOException $e) {
        error_log("Error en la conexión: " . $e->getMessage());
        echo json_encode(["status" => "error", "message" => "Error en el servidor."]);
        exit;
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
    exit;
}
?>