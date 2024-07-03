<?php

// Definição das constantes para credenciais do banco de dados
define("USER_BD","root");
define("PASS_BD","");
define("NOME_BD","GestaDeCursoPHP");

// Hostname do servidor MySQL
$hostname_conn = "localhost";

// Estabelecimento da conexão com o servidor MySQL
$conn = mysqli_connect($hostname_conn, USER_BD, PASS_BD, NOME_BD);

// Verificação da conexão
if (!$conn) {
    die("Erro ao conectar ao MySQL: " . mysqli_connect_error());
} 

?>
