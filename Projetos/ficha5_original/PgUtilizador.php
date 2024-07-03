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
	}
  
	input[type=submit]{
		background-color:#088A29;
		padding:20px 30px;
		font: bold 15px sans-serif;
		color:white;
		box-shadow:2px 2px 5px #000000;
		cursor:pointer;
		border:0px;
	}
	
	input[type=submit]:hover{
		box-shadow:1px 1px 5px #000000;
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
	    width:1000px;
		background-color: #BCF5A9;
		margin: 8px auto 0px;
	}
  
	#btCorpo{
	  margin: 30px  auto 30px;
	  width:800px;
      height:100px;
      border: 2px solid #0B610B;
      font: bold 25px sans-serif;
	  color:white;
	}
  
    .botaoCorpo{
      margin-left: 100px ;
      margin-right: 100px ;
      margin-top:-8px;
	}
	
	#loading{
		background-color:#A9F5A9;
		width:380px;
		margin: 200px auto 0px;
		overflow:hidden;
		box-shadow:0px 0px 5px #6F6666;
		text-align:center;
		font: bold 20px/50px sans-serif;
		color: white;
	}
	
	#img{
		float:center;
		border: 2px solid #0B610B;
		background-color:#A9F5A9;
		margin:20px;
		float:right;
	}
</style>  
<body>  
	
	<?php
	
		session_start();
		
		if(isset($_SESSION["user"])){
			
				
			$user = $_SESSION["user"];
			unset($_SESSION);
			$_SESSION["user"] = $user;
						
			// ===============================================================
			include './base_dados/basedados.h';
			include "./ConstUtilizadores.php";
			//Selecionar user correspondente da base de dados
			$sql = "SELECT * FROM utilizador WHERE nomeUtilizador = '".$_SESSION["user"]."'";
			$retval = mysqli_query( $conn, $sql );
			if(! $retval ){
				die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
			}
			$row = mysqli_fetch_array($retval);
			
			if($row["tipoUtilizador"]!=CLIENTE_NAO_VALIDO && $row["tipoUtilizador"]!=CLIENTE_APAGADO){
				// ===============================================================
				
				echo"<div id='cabecalho'>
						<a href='./pagina_inicial.php'>
							<div id='logo'>
							</div>
						</a>
							<img src = './imgs/".$row['imagem']."' width=100 height = 100 id=img>
						<div class= 'input-div'>
							<div id='botao'>
								<form action='./logout.php'>
									<input type='submit' value='Logout'>
								</form>
							</div>
							<div id='botao'>
								<form action='./pagina_inicial.php'>
									<input type='submit' value='Página Principal'>
								</form>
							</div>
							<div id='botao'>
							  <form action='./contatos.php'>
								<input type='submit' value='Contactos'>
							  </form>
							</div>
						</div>
					</div>";
				
				//PERSONALIZAÇÃO
				switch($row["tipoUtilizador"]){
						
					case ADMINISTRADOR:
						//==============================ADMINISTRADOR===============================//
						echo "<div id='corpo'>";
						printDadosPessoais();
						printGestãoReservas();
						printGestãoUtilizadores();
						printGestãoCabanas();
						echo"</div>";
					break;
					
					case FUNCIONARIO:
						//===============================FUNCIONARIO================================//
						echo "<div id='corpo'>";
						printDadosPessoais();
						printGestãoReservas();
						echo"</div>";
					break;
						
					case SOCIO:
						//==================================SOCIO===================================//
						echo "<div id='corpo'>";
						printContactos();
						printGestãoReservas();
						printDadosPessoais();
						printGestãoQuotas();
						echo"</div>";
					break;
						
					case CLIENTE:
						//=================================CLIENTE==================================//
						echo "<div id='corpo'>";
						printContactos();
						printGestãoReservas();
						printDadosPessoais();
						echo"</div>";
					break;
					
				}
				
			}else{
				echo "<script>setTimeout(function(){ window.location.href = './logout.php'; }, 0)</script>";
			}
			
		}else
			echo "<script>setTimeout(function(){ window.location.href = '.(logout.php'; }, 0)</script>";
			
			
			
			
		function printContactos(){
			//Contactos
			echo 
			"<div class='botaoCorpo'>
				<form action='./contatos.php'>
					<input type='submit' value='Contactos' id='btCorpo'>
				</form>
			</div>";
			
		}
		
		function printGestãoCabanas(){
			//Contactos
			echo 
			"<div class='botaoCorpo'>
				<form action='./PgGestCabanas.php'>
					<input type='submit' value='Gestão Cabanas' id='btCorpo'>
				</form>
			</div>";
			
		}
		
		function printDadosPessoais(){
			//Dados Pessoais
			echo
			"<div class='botaoCorpo'>
				<form action= './DadosPessoais.php' method='GET'>
					<input type='text' name='IdUser' value='".$_SESSION["user"]."' hidden/>
					<input type='submit' value='Dados Pessoais' id='btCorpo'/>
				</form>
			</div>";
		}

		function printGestãoQuotas(){
			//Quotas
			echo 
			"<div class='botaoCorpo'>
				<form action='./PgQuotas.php'>
					<input type='submit' value='Gestão Quotas' id='btCorpo'>
				</form>
			</div>";
		}
		
		function printGestãoReservas(){
			//Gestão Reservas
			echo
			"<div class='botaoCorpo'>
				<form action='./PgGestReservas.php'>
					<input type='submit' value='Gestão Reservas' id='btCorpo'>
				</form>
			</div>";
		}
		
		function printGestãoUtilizadores(){
			//Gestão Utilizadores
			echo 
			"<div class='botaoCorpo'>
				<form action='./PgGestUtilizadores.php'>
					<input type='submit' value='Gestão Utilizadores' id='btCorpo'>
				</form>
			</div>";
		}
	?>
</body>
</html>