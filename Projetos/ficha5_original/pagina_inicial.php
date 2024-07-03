<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ficha 5 PHP</title>
</head>
<style>  
  
	body{
		background-color:#376141; 
	}
	#cabecalho{
		margin: -8px;
		height:200px;
		background-image:url(./imgs/cabecalho.png);
		border: 2px solid #0B610B;
	}
	
	.input-div{    
		margin:25px;
		float:right;
		height:150px;
	}
  
	input[type=submit]{
   
		background-color:#088A29;
		padding:10px 20px;
		height:50px;
		font: bold 15px sans-serif;
		color:white;
		box-shadow:2px 2px 5px #000000;
		cursor:pointer;
		border:0px;
	}
	
	input[type=submit]:hover{
		box-shadow:1px 1px 5px #000000;
	}
	
	#botoes{
		margin:70px;
	}
  
	#botao{
		float:right;
		margin:10px;
	}
  
	#logo{
		float:left;
		background-image:url(./imgs/logo_tipo.png);
		margin-left:80px;
		margin-top:90px;
		width:180px;
		height:60px;
	}
	
	a:link{
		color:black;
		font: bold 15px sans-serif;
		text-decoration:none;
	}
	a:visited{
		color:black;
		font: bold 15px sans-serif;
		text-decoration:none;
	}
	
	#corpo{
		width:1000px;
		margin: 8px auto 0px;
	}
	#tabela{
		width:1000px;
		margin: 0px auto 0px;
	}
	#preco{
		font: normal 15px sans-serif;
		text-align: right;
	}
	
	#titulo{
		font: bold 15px sans-serif;
		text-decoration:no;
		text-align: left;
	}
	table, th, td {
		border-collapse: collapse;
	}
	th, td {
		padding: 15px 50px;
	}
	table#t01 tr:nth-child(even) {
		background-color: #4C8E5C;
	}
	table#t01 tr:nth-child(odd) {
		background-color: #BCF5A9;
	}
</style>  
<body>  
	<!-- GRAFISMO CABECALHO -->
<div id="cabecalho">
	<a href='pagina_inicial.php'>
		<div id="logo">
		</div>
	</a>
    <div class= "input-div">
		<div id="botoes"> 
			<?php
				ob_start();
				session_start();
				
				if(isset($_SESSION["user"])){
					
					$user = $_SESSION["user"];
					unset($_SESSION);
					$_SESSION["user"] = $user;
					
					echo "
						<div id='botao'>
							<form action='./logout.php'>
								<input type='submit' value='Logout'>
							</form>
						</div>
						<div id='botao'>
							<form action='./PgUtilizador.php'>
								<input type='submit' value='Area Pessoal'>
							</form>
						</div>
					";	
				}else {
					
					echo "
						<div id='botao'>
							<form action='./PgLogin.php'>
								<input type='submit' value='Login'>
							</form>
						</div>
						<div id='botao'> 
							<form action='./PgRegisto.php'>
								<input type='submit' value='Registe-se'>
							</form>
						</div>
					";
					
				}
			?>
			<div id='botao'>
				<form action="contatos.php">
					<input type='submit' value='Contactos'>
				</form>
			</div>
		</div>
    </div>
</div>
  <!-- GRAFISMO CORPO -->
<div id="corpo">
	<div id="tabela">
		<?php
			include "./base_dados/basedados.h";
			$sql = "SELECT nome,preco_p_noite,img_cabana,idCabana FROM cabana WHERE estado = '1'";
			$retval = mysqli_query( $conn, $sql );
			if(! $retval ){
				die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
			}
			echo "<table width='100%' id = 't01'>";
			while($row = mysqli_fetch_array($retval)){
				echo"
				<tr>
					<td><a href='PgDescricao.php?IdCabana=".$row["idCabana"]."' ><img src='./imgs/".$row["img_cabana"]."'></a></td>
					<td><a href='PgDescricao.php?IdCabana=".$row["idCabana"]."' ><div id='titulo'><b>".$row["nome"]."</b></div></a></td>
					<td><div id='preco'>".$row["preco_p_noite"]." p/ noite</div></td>
				</tr>"
				;	
			}
			echo "</table>";
		?>	
	</div>
</div>
</body>
</html>