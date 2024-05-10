<?php
// Configurações de conexão com o banco de dados
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_DATABASE', 'CursoDB');

// Função para conectar ao banco de dados MySQL usando PDO
function connect() {
    $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    try {
        return new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
    } catch (Exception $e) {
        exit('Falha ao conectar: ' . $e->getMessage());
    }
}
