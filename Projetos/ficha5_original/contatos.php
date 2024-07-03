<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>3vago</title>
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
	#tabela{
		width:1000px;
		margin: 0px auto 0px;
	}
	table, th, td {
		
		font: normal 15px sans-serif;
		border-collapse: collapse;
	}
	th, td {
		padding: 15px 50px;
	}
	
	
	
	table#tCont tr:nth-child(even) {
		background-color: #4C8E5C;
	}
	table#tCont tr:nth-child(odd) {
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
				echo " 
				<div id='botao'>
					<form action='./Utilizador/logout.php'>
						<input type='submit' value='Logout'>
					</form>
				</div>
				<div id='botao'>
					<form action='./Utilizador/PgUtilizador.php'>
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
        <div id="botao">
          <form action ="pagina_inicial.php">
            <input type="submit" value="Página Principal">
          </form>
        </div>
      </div>
    </div>
</div>
<!-- GRAFISMO CORPO -->
<div id="corpo">
	<div id="tabela">
		<table width='100%' id = 'tCont'>	
		<tr>
			<td> <div id="logo"> </div></td><td>MORADA:<br>RUA de CIMA <br> LOTE DE BAIXO </td>
		</tr>
		<tr>
			<td><b>Horário de Funcionamento</b></td>
			<td><b>Manhã</b><br>9h-12h<br><b>Tarde</b><br>13h-18h</td>
		</tr>
		
		</table>
	</div>
</div>
</body>
</html>