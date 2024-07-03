<?php
session_start();

// Verificar se os dados do formulário foram enviados
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Dados do formulário
    $utilizador = $_POST["username"];
    $password = $_POST["password"];

    // Incluir o arquivo de conexão com o banco de dados
    include '../basedados/basedados.h';
    include './constantes.php'; // Inclua as constantes dos tipos de utilizador

    // Verificar se a conexão foi estabelecida corretamente
    if (!$conn) {
        die('Erro ao conectar ao MySQL: logim.php' . mysqli_connect_error());
    }

    // Selecionar usuário correspondente na base de dados
    $sql = "SELECT * FROM Usuarios WHERE Nome = '$utilizador' AND Senha = '".md5($password)."' AND PerfilID != ".CLIENTE_APAGADO." AND Ativo = TRUE";

    echo "Consulta SQL: $sql<br>";


    $retval = mysqli_query($conn, $sql);

    // Verifica se a consulta foi bem-sucedida
    if (!$retval) {
        die('Erro ao obter dados: ' . mysqli_error($conn));
    }

    $row = mysqli_fetch_array($retval);

    // Debug: Exibir os dados obtidos da base de dados (opcional)
    if ($row) {
        echo "Dados do usuário obtidos:<br>";
        print_r($row);
        echo "<br>";
    } else {
        echo "Nenhum usuário encontrado com os dados fornecidos.<br>";
    }
    

    // Verifica se o nome do usuário existe na base de dados e os dados estão corretos
    if ($row) {
        // Dados válidos
        $_SESSION["user"] = $row["Nome"];
        $_SESSION["tipo"] = $row["PerfilID"];

        // Redirecionar com base no tipo de usuário
        switch ($_SESSION["tipo"]) {
            case 1:
            case 2:
            case 3:
                header("Location: ./PgUtilizador.php");
                exit();

            case 4:
                // Redirecionar para página de usuário não válido
                header("Location: ./paginaInicial");
                exit();
            default:
                // Se o tipo de usuário não for reconhecido, destrói a sessão e redireciona para a página inicial
                session_destroy();
                header("Location: ./paginaInicial.php");
                exit();
        }
    } else {
        // Usuário ou senha inválidos ou usuário foi apagado
        $_SESSION["user"] = -1;
        $_SESSION["tipo"] = -1;
        header("Location: ./paginaInicial.php"); // Redireciona para a página inicial ou uma página de erro
        exit();
    }
} else {
    // Dados não foram enviados, destruir a sessão e redirecionar para a página inicial
    session_destroy();
    header("Location: ./paginaInicial.php");
    exit();
}
?>
