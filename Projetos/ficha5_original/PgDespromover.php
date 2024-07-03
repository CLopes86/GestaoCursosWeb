<?php
$id_user = $_GET["IdUser"];
include "./base_dados/basedados.h";
$sql = "UPDATE utilizador SET tipoUtilizador = '5' WHERE nomeUtilizador='$id_user'";
$res = mysqli_query ($conn, $sql);
header ("Location:PgGestUtilizadores.php");
?>