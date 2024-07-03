<html>
<head>
<style>
  body{
    background-image:url(../media/imgs_sistema/fundoLogin.jpg);
    background-position: top center;
  }
  
  #erro-box{
    background-color:#F78181;
    width:380px;
    height:200px;
    margin: 140px auto 0px;
    overflow:hidden;
    box-shadow:0px 0px 5px #6F6666;
  }
  
  #erro-cabecalho{
    background-color:red;
    height:50x;
    border-bottom:2px solid #BDBDBD;
    text-align:center;
    font: bold 20px/50px sans-serif;
    color: white;
  }
  
  .input-div{
    margin:20px;
    padding:5px;
    font: bold 15px sans-serif;
    color:black;
   }
 
  .input-div input{
    width:325px;
    height:35px;
    padding-left:7px;
    font: normal 13px sans-serif;
    color:#0B6121;
  }
  #input-pass{
    margin-top:-15px;
  }
  #input-user{
    margin-top:10px;
  }
  
  #acoes{
    width:330px;
    margin:25px;
  }
  
  #registo{
    float:left;
    margin-top:-10px;
  }
  
  input[type=submit]{
    float:right;
    background-color:red;
    padding: 10px 50px;
    margin-top:-15px;
    font: bold 13px sans-serif;
    color:white;
    box-shadow:2px 2px 5px #6F6666;
    cursor:pointer;
    border:0px;
  }
  
  input[type=submit]:hover{
    box-shadow:1px 1px 5px #6F6666;
  }
  
</style>
<body>

<?php

	session_start();
	
	$msg = "Algo não correu bem!!! Dirija-se para a Página de Login ou Registe-se";
	$btn = "Página Login";
	$dir = "index.php";
	
	if(isset($_SESSION["erro"]))
		$msg = $_SESSION["erro"];
	if(isset($_SESSION["bt"]))
		$btn = $_SESSION["bt"];
	if(isset($_SESSION["dir"]))
		$dir = $_SESSION["dir"];
	
	echo "
	<div id='erro-box'>
		<div id='erro-cabecalho'>Lamentamos...</div>
 
		<div class='input-div' id='input-user'>
			$msg
		</div> 
  <!--=====================Login=====================-->
		<form action='".$dir."'>
			<div id='acoes'>
				<input type='submit' value ='".$btn."'>
				<div id = 'registo'><a href='./Registo/registo.php'>Registe-se...</a></div>
			</div>
		</form>";
		
	session_destroy();
?>
    </div>
  
</body>	
</html>

