<?php
include "./base_dados/basedados.h";

$nomeUtilizador = $_POST["user"];
$mail = $_POST["imagem"];
$imagem  = $_POST['morada'];
$morada = $_POST['morada'];
$pass = $_POST["pass"];
$tlm = $_POST["tlm"];


$sql = "INSERT INTO `utilizador` (`nomeUtilizador`, `mail`, `imagem`, `morada`, `pass`, `telemovel`, `tipoUtilizador`) 
					VALUES ('".$nomeUtilizador."', '".$mail."','".$imagem."','".$morada."','".md5($pass)."','".$tlm."', '5');";
//echo $sql;
$res = mysqli_query ($conn, $sql);
header ("Location:./PGGestUtilizadores.php");
?>