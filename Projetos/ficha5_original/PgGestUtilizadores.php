<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ficha 5</title>
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
		padding:10px 30px;
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
  
	#corpo{
		margin: 25px;
	}
	
	td {
		font: normal 15px sans-serif;
	}
	
	th {
		font: bold 15px sans-serif;
		text-align: left
	}
	table, th, td {
		
		border-collapse: collapse;
	}
	th, td {
		padding: 15px 20px;
	}
	table#t01 tr:nth-child(even) {
		color:white;
		background-color: #4C8E5C;
	}
	table#t01 tr:nth-child(odd) {
		background-color: #BCF5A9;
	}
	
	#btnNv{
		font: bold 19px sans-serif;
		margin-bottom: 20px;
		padding: 10px 70px;
	}
	
</style>  
<body>  
	<!-- GRAFISMO CABECALHO -->
<div id="cabecalho">
	<a href='../index.php'>
		<div id="logo">
		</div>
	</a>
    <div class= "input-div">
      <div id="botoes"> 
	<?php
		ob_start();
		session_start();
		
		if(isset($_SESSION["user"])){
			echo " <div id='botao'>
				<form action='./logout.php'>
					<input type='submit' value='Logout'>
				</form>
			</div>
			<div id='botao'>
				<form action='./PgUtilizador.php'>
					<input type='submit' value='Página Inicial'>
				</form>
			</div>
			";	
		}else {
			
			echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 2000)</script>";
			
		}
	?>
        <div id='botao'>
          <form action="../contatos.php">
            <input type='submit' value='Contactos'>
          </form>
        </div>
      </div>
    </div>
</div>
  <!-- GRAFISMO CORPO -->
<div id="corpo">
	
	<form action="./PgNovoUtilizador.php">
		<input type='submit' value='Novo Utilizador' id="btnNv">
	</form>
	
	<div id="tabela">
		<?php
			if(isset($_SESSION["user"])){
				include "./base_dados/basedados.h";
				include "./ConstUtilizadores.php";
				// ==========================Quem é o utilizador==========================
				$sql = "SELECT tipoUtilizador FROM utilizador WHERE nomeUtilizador='".$_SESSION["user"]."'";
							
				// ====================================================		
				$retval = mysqli_query( $conn, $sql );
				if(! $retval ){
					die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
				}
				$row = mysqli_fetch_array($retval);
				$tipoUtilizador = $row["tipoUtilizador"];
				
				$pode=true;
				
				if($tipoUtilizador!=ADMINISTRADOR){
					$pode=false;
					echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 000)</script>";
				}
				
				if($pode){
					// ====================================================
					$sql = "SELECT * FROM utilizador";
					$retval = mysqli_query( $conn, $sql );
					if(! $retval ){
						die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
					}
					
					echo "<table width='100%' id = 't01'>
					<tr>
						<th>Nome Utilizador:</th>
						<th>Tipo:</th>
						<th>Telemóvel:</th>
						<th>Validar:</th>
						<th>Editar:</th>
						<th>(Des)Promover:</th>
					</tr>";
					while($row = mysqli_fetch_array($retval)){
						echo"
						<tr>
							<td>".$row["nomeUtilizador"]."</td>
							<td>".getDescricaoUtilizador($row["tipoUtilizador"])."</td>
							<td>".$row["telemovel"]  ."</td>";
						//VALIDAR						
						if($row["tipoUtilizador"] == CLIENTE_NAO_VALIDO)
							echo"	<td><a href='./validar.php?IdUser=".$row["nomeUtilizador"]."' ><img src='./imgs/validar.png' width=50 height=50></a></td>";
						else
							echo"<td></td>";
						//EDITAR
						if($row["tipoUtilizador"] != CLIENTE_APAGADO){
							echo"	<td><a href='preparaEditar.php?IdUser=".$row["nomeUtilizador"]."' ><img src='./imgs/editar.png' width=50 height=50></a></td>";
						}else
							echo"<td></td>";
						//PROMOVER
						if($row["tipoUtilizador"] != ADMINISTRADOR)
							echo "<td><a href='PgDespromover.php?IdUser=".$row["nomeUtilizador"]."' ><img src='./imgs/promover.png' width=50 height=50></a></td>";
						else
							echo"<td></td>";
						
						
						
						echo "</tr>";	
					}
					echo"</table>";
				}
			}
			
			function getDescricaoUtilizador($tipoNumerico){
				
				switch($tipoNumerico){
					case ADMINISTRADOR:
						return "Administrador";
					break;
					case FUNCIONARIO:
						return "Funcionário";
					break;
					case SOCIO:
						return "Socio";
					break;
					case CLIENTE:
						return "Cliente validado";
					break;
					case CLIENTE_APAGADO:
						return "Utilizador apagado";
					break;
					case CLIENTE_NAO_VALIDO:
						return "Cliente não validado";
					break;
					default:
						return "Desconhecido";
					break;
				}
				
			}
			
		?>
		
	</div>
</div>
</body>
</html>