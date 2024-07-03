<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Dados Pessoais</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Substitua pelo caminho correto -->
    
    <?php
    // Inclui o arquivo de conexão com a base de dados
    include '../basedados/basedados.h';

    // Obtém o ID do usuário a partir dos parâmetros da URL
    $id_user = $_GET["IdUser"];

    // Consulta SQL para obter os dados do usuário
    $sql = "SELECT * FROM Usuarios WHERE UsuarioID='$id_user'";
    $res = mysqli_query($conn, $sql);
    $dados_user = mysqli_fetch_array($res);

    // Atribui os dados do usuário a variáveis
    $nome = $dados_user['Nome'];
    $email = $dados_user['Email'];
    $telefone = $dados_user['Telefone'];
    $endereco = $dados_user['Endereco'];
    ?>

</head>
<body>
    <div id='body'>
        <form method='POST' action='updateDados.php' class='registro-form'>
            <div class='form-group'>
                Nome de Utilizador:<br>
                <input type='text' name='IdUser' value="<?php echo $nome; ?>" readonly><br>
            </div>

            <div class='form-group'>
                Email:<br>
                <input type='email' name='email' id='email' value="<?php echo $email; ?>"><br>
            </div>

            <div class='form-group'>
                Nova Password (facultativo):<br>
                <input type='password' name='password'><br>
            </div>

            <div class='form-group'>
                Confirmação da Password:<br>
                <input type='password' name='conf_pass'><br>
            </div>

            <div class='form-group'>
                Contato:<br>
                <input type='tel' name='telefone' value="<?php echo $telefone; ?>"><br>
            </div>

            <div class='form-group'>
                Morada:<br>
                <input type='text' name='morada' value="<?php echo $endereco; ?>"><br>
            </div>

            <div id='btRegisto'>
                <input type='submit' value='Atualizar' id='registo'>
            </div>
        </form>
    </div>
</body>
</html>
