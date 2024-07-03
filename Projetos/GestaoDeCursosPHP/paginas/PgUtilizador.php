<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Utilizador</title>
    <link rel="stylesheet" href="estilos.css"> 
</head>
<body>
    <?php
    session_start(); // Inicia a sessão

    // Verifica se a sessão do usuário está definida
    if (isset($_SESSION["user"]) && isset($_SESSION["tipo"])) {
        
        $user = $_SESSION["user"]; // Armazena o nome de usuário da sessão
        $tipoUsuario = $_SESSION["tipo"];
        
        include '../basedados/basedados.h'; // Inclui o arquivo de conexão com o banco de dados
        include './constantes.php'; // Inclui o arquivo de constantes

        // Selecionar o usuário correspondente da base de dados
        $sql = "SELECT * FROM Usuarios WHERE Nome = '$user' AND PerfilID = $tipoUsuario"; // SQL para selecionar dados do usuário
        $resultado = mysqli_query($conn, $sql); // Executa a consulta SQL

        // Verifica se a consulta foi bem-sucedida
        if (!$resultado) {
            die('Erro ao buscar dados do usuário: ' . mysqli_error($conn)); // Exibe mensagem de erro se a consulta falhar
        }

        $row = mysqli_fetch_array($resultado); // Recupera os dados do usuário

        // Verifica se o usuário é válido
          if ($row["PerfilID"] != CLIENTE_NAO_VALIDO && $row["PerfilID"] != CLIENTE_APAGADO && $row["Ativo"]) {
           

           // Exibir cabeçalho
            
// ...
    echo "<div id='cabecalho'>
        <div class='logo'>
            <img src='imgs/logo.png' alt='Logo'>
        </div>
        
        <nav>
            <ul class='botao'>
                <li><a href='./logout.php'>Sair</a></li>
            </ul>
        </nav>
      </div>";

// Abre a div de conteúdo principal
    echo "<div id='corpo'>";


          

            // Exibe o conteúdo baseado no tipo de usuário
            switch ($tipoUsuario) {
                case 1:
                    printDadosPessoais($user); 
                    printGerirUtilizadores(); 
                    printGerirInscricoes(); 
                    break;

                case 2:
                    printDadosPessoais($user); 
                    printGerirInscricoes(); 
                    break;

                case 3:
                    printDadosPessoais($user); 
                    printGerirInscricoes(); 
                    break;

                default:
                    echo "<p>Tipo de usuário não reconhecido.</p>"; // Mensagem para tipo de usuário não reconhecido
                    break;
            }

            // Fecha a div de conteúdo principal
            echo "</div>";
        } else {
            // Redireciona para logout se o usuário não for válido
            echo "<script>setTimeout(function(){ window.location.href = './logout.php'; }, 0)</script>";
        }
    } else {
        // Redireciona para a página inicial se a sessão do usuário não estiver definida
        echo "<script>setTimeout(function(){ window.location.href = './pagina_inicial.php'; }, 0)</script>";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);

    // Função para exibir dados pessoais
 // Função para exibir dados pessoais
function printDadosPessoais() {
    echo "<div class='botaoCorpo'>
        <form action='./dadosPessoais.php' method='GET'>
            <input type='text' name='IdUser' value='".$_SESSION["user"]."' hidden/>
            <input type='submit' value='Dados Pessoais' class='btCorpo'/>
        </form>
      </div>";
}

// Função para exibir gestão de utilizadores
function printGerirUtilizadores() {
    echo "<div class='botaoCorpo'>
            <form action='./PgGestaoUtilizadres.php'>
                <input type='submit' value='Gestão de Utilizadores' class='btCorpo'>
            </form>
          </div>";
}

// Função para exibir gestão de inscrições
function printGerirInscricoes() {
    echo "<div class='botaoCorpo'>
            <form action='./PgGestInscricoes.php'>
                <input type='submit' value='Gestão de Inscrições' class='btCorpo'>
            </form>
          </div>";
}



    ?>
</body>
</html>
