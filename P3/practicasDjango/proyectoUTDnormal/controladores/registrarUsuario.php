<?php
include '../controladores/config.php'; 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($username) || empty($email) || empty($first_name) || empty($last_name) || empty($password) || empty($confirm_password)) {
        die("Todos los campos son obligatorios.");
    }

    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no es válido.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $db = new conn();
        $conn = $db->connect();

        $sql = "INSERT INTO usuarios (username, email, first_name, last_name, password, privilegio) 
                VALUES (:username, :email, :first_name, :last_name, :password, 'usuario')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        session_start();
        $_SESSION['user_id'] = $conn->lastInsertId();
        $_SESSION['username'] = $username;

        header("Location: ../index.php");
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            die("El nombre de usuario o correo ya están registrados.");
        } else {
            die("Error al registrar el usuario: " . $e->getMessage());
        }
    }
} else {
    die("Método de solicitud no válido.");
}
?>
