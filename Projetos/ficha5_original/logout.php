<html>
<head>
<style>
	body{
		background-image:url(./imgs/fundoLogin.jpg);
		background-position: top center;
	}
</style>
<body>
</body>
</head>
</html>  

<?php
	session_start();
	session_destroy();
	header("refresh:0;url = ./pagina_inicial.php");
?>