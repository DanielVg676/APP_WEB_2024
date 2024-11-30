<?php
include('../config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>
                alert('Por favor, completa todos los campos.');
                window.history.back();
              </script>";
        exit;
    }

    $database = new conn();
    $pdo = $database->connect();

    try {
        $query = "SELECT id, username, email, password FROM usuarios WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
        
            echo "<script>
                    alert('Inicio de sesión exitoso.');
                    window.location.href = '../../index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Nombre de usuario o contraseña incorrectos.');
                    window.history.back();
                  </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('Error en el inicio de sesión. Inténtalo más tarde.');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('Acceso no permitido.');
            window.history.back();
          </script>";
}
?>
