<?php
// Incluir o arquivo de conexão com o banco de dados
include '../basedados/basedados.h'; 

// Verificar se a senha ou a confirmação da senha não estão vazias
if (strcmp($_POST["password"], "") != 0 || strcmp($_POST["conf_pass"], "") != 0) {
    
    // Verificar se a senha e a confirmação de senha são iguais
    if (strcmp($_POST["password"], $_POST["conf_pass"]) == 0) {
        // Password pode ser modificada

        // Construir a consulta SQL para atualizar os dados com nova senha
        $sql = "UPDATE Usuarios
                SET
                    email='".$_POST["email"]."',
                    morada='".$_POST["morada"]."',
                    password='".md5($_POST["password"])."',
                    Telefone='".$_POST["telefone"]."'
                WHERE UsuarioID='".$_POST["IdUser"]."'";

        // Executar a consulta SQL
        $retval = mysqli_query($conn, $sql);

        // Verificar se a consulta foi executada com sucesso
        if (!$retval) {
            // Se não funcionar, exibir mensagem de erro
            die('Could not get data: ' . mysqli_error($conn));
        }

    } else {
        // Senhas incompatíveis

        // Exibir alerta de erro
        echo " <script> alert ('ERRO! Passwords incompatíveis!') </script>";

        // Redirecionar de volta para a página de Dados Pessoais após 0 segundos
        echo "<script> setTimeout(function () { window.location.href = './DadosPessoais.php'; }, 0)</script>";
    }

} else {
    // Se a senha e a confirmação da senha estiverem vazias, atualizar apenas os outros dados

    // Construir a consulta SQL para atualizar os dados sem modificar a senha
    $sql = "UPDATE Usuarios
            SET
                email='".$_POST["email"]."',
                morada='".$_POST["morada"]."',
                Telefone='".$_POST["telemovel"]."'
            WHERE UsuarioID='".$_POST["IdUser"]."'";

    // Executar a consulta SQL
    $retval = mysqli_query($conn, $sql);

    // Verificar se a consulta foi executada com sucesso
    if (!$retval) {
        // Se não funcionar, exibir mensagem de erro
        die('Could not get data: ' . mysqli_error($conn));
    }
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
