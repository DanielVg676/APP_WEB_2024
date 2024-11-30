<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);

    if (empty($username) || empty($email) || empty($nombre) || empty($apellidos) || empty($password) || empty($password2)) {
        echo "<script>
                alert('Por favor, completa todos los campos.');
                window.history.back();
              </script>";
        exit;
    }

    if ($password !== $password2) {
        echo "<script>
                alert('Las contraseñas no coinciden.');
                window.history.back();
              </script>";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $database = new conn();
    $pdo = $database->connect();

    try {
        $query = "INSERT INTO usuarios (username, email, nombre, apellidos, password) VALUES (:username, :email, :nombre, :apellidos, :password)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':password', $hashed_password);

        $stmt->execute();

        echo "<script>
                alert('Usuario registrado con éxito.');
                window.location.href = '../login.php';
              </script>";
        exit;
    } catch (PDOException $e) {
        if ($e->errorInfo[1] === 1062) {
            echo "<script>
                    alert('El nombre de usuario o correo electrónico ya está registrado.');
                    window.history.back();
                  </script>";
        } else {
            echo "<script>
                    alert('Error al registrar el usuario: " . $e->getMessage() . "');
                    window.history.back();
                  </script>";
        }
        exit;
    }
} else {
    echo "<script>
            alert('Acceso no permitido.');
            window.history.back();
          </script>";
    exit;
}
?>
