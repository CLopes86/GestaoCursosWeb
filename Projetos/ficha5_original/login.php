<html>
<head>
  <meta charset="utf-8">
  <title>3vago</title>
</head>
<style>
	body{
		background-image:url(./imgs/fundoLogin.jpg);
		background-position: top center;
	}
	#loading{
		background-color:#A9F5A9;
		width:380px;
		height:50px;
		margin: 200px auto 0px;
		overflow:hidden;
		box-shadow:0px 0px 5px #6F6666;
		text-align:center;
		font: bold 20px/50px sans-serif;
		color: white;
	}
</style>
<body>
</body>
</html>  
  
<?php

session_start();

if(isset($_POST["user"]) && isset($_POST["pass"])){
	
	//Dados do formulário
	$utilizador = $_POST["user"];
	$password = $_POST["pass"];
	include './base_dados/basedados.h';
	include './ConstUtilizadores.php';
	//==================================================================//
	//Selecionar user correspondente da base de dados
	$sql = "SELECT * FROM utilizador WHERE nomeUtilizador = '$utilizador' AND pass = '".md5($password)."' AND tipoUtilizador != ".CLIENTE_APAGADO.";";
	$retval = mysqli_query( $conn, $sql );
	
	if(! $retval ){
		die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
	}
	$row = mysqli_fetch_array($retval);
	
	//==================================================================//
	if(strcmp($row["nomeUtilizador"], $utilizador) == 0 && strcmp($row["pass"], md5($password)) == 0){
		//=========================DADOS VÁLIDOS=========================//
		//Identifica o utilizador 
		$_SESSION["user"] = $row["nomeUtilizador"];
		$_SESSION["tipo"] = $row["tipoUtilizador"];
	}else{
		$_SESSION["user"] = -1;
		$_SESSION["tipo"] = -1;
	}
	echo "<div id='loading'>Loading...</div><script> setTimeout(function () { window.location.href = 'secreta.php'; }, 1000)</script>";	
}else{
	session_destroy();
	header("refresh:0;url = ./pagina_inicial.php");
}
?>