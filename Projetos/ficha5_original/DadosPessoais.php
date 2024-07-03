<?php
$id_user = $_GET["IdUser"]; 
include "./base_dados/basedados.h";

$sql = "SELECT * FROM utilizador WHERE nomeUtilizador='$id_user'"; 
$res = mysqli_query ($conn, $sql);
$dados_user = mysqli_fetch_array ($res);

$nome = $dados_user['nomeUtilizador'];
$telemovel = $dados_user['telemovel'];
$morada = $dados_user['morada'];
$imagem = $dados_user['imagem'];
$email = $dados_user['mail'];
echo "

<form method='POST' action='updateDados.php'>
    
    <div class='form-div'>
        Nome de Utilizador:<br>
        <input type = 'text' name='IdUser' value='$nome' readonly><br>
    </div>

    <div class='form-div'>
        Email:<br>
        <input type = 'email' name='email' value='$email'><br>
    </div>

    <div class='form-div'>
        Nova Password (facultativo):<br>
        <input type = 'password' name='pass'><br>
    </div>

    <div class='form-div'>
        Confirmação da Password:<br>
        <input type = 'password' name='conf_pass'><br>
    </div>

    <div class='form-div'>
        Telemóvel:<br>
        <input type = 'tel' name='telemovel' value='$telemovel'><br>
    </div>

    <div class='form-div' >
        Morada:<br>
        <input type = 'text' name='morada' value='$morada'><br>
    </div>

    <div class='form-div' >
        Imagem:<br>
        <input type = 'text' name='imagem' value='$imagem'><br>
    </div>

    <div id='btRegisto' >
        <input type='submit' value='Actualizar' id='registo'>
</form>
";
?>