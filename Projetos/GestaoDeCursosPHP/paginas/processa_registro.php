<?php


// Incluir o arquivo de conexão com o banco de dados
include "../basedados/basedados.h";



// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    
    // Consulta SQL para obter o PerfilID de "Visitante"
    $sql_perfil = "SELECT PerfilID FROM Perfis WHERE Descricao = 'Visitante'";
    $resultado = mysqli_query($conn, $sql_perfil);

    // Verificar se a consulta foi bem-sucedida
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $perfil = $row['PerfilID']; // PerfilID correspondente a "Visitante"
        $ativo = 'FALSE'; // Usuário novo começa como inativo

       

        // Inserir os dados na tabela Usuarios
        $sql = "INSERT INTO Usuarios (Nome, Email, Senha, Endereco, Telefone, PerfilID, Ativo) 
                VALUES ('$nome', '$email', '$senha', '$endereco', '$telefone', $perfil, $ativo)";

       

        // Executar a consulta
        if (mysqli_query($conn, $sql)) {
            // Redirecionar para a página de confirmação após o registro
            header("Location: ./PgConfirmacao.php");
            exit;
        } else {
            echo "Erro ao registrar: " . mysqli_error($conn);
        }
    } else {
        echo "Erro ao obter o PerfilID de Visitante.";
    }

    // Fechar a conexão
    mysqli_close($conn);
} 
?>
