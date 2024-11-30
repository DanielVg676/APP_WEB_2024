<?php
class conn {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "bd_proyectoutd";

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            return new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            error_log("Error en la conexión: " . $e->getMessage());
            echo "Error al conectar a la base de datos. Contacte al administrador.";
            exit;
        }
    }
}
?>
