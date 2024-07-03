<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Link para o arquivo CSS -->
</head>
<body>
    <!-- Cabeçalho -->
    <header id="cabecalho">
        <div class="logo">
            <img src="imgs/logo.png" alt="Logo">
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="paginaInicial.php">Início</a></li>
                <li><a href="Pg_Sobre.php">Sobre</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="contato.php">Contato</a></li>
                 <?php
                    // Inicia a sessão
                    session_start();

                    // Verifica se o usuário está logado
                    if(isset($_SESSION["user"])) {
                        // Usuário está logado
                        // Não mostra a opção de registrar-se no menu
                    } else {
                        // Usuário não está logado
                        // Mostra a opção de registrar-se no menu
                        echo '<li><a href="PgRegisto.php">Registrar-se</a></li>';
                    }
                ?>
            </ul>
        </nav>
        <div class="login">
             <?php
                // Verifica se o usuário está logado para exibir os botões de logout e área pessoal
                if(isset($_SESSION["user"])) {
                    // Armazena o nome do usuário na variável $user
                    $user = $_SESSION["user"];

                    // Limpa todas as variáveis da sessão
                    session_unset();

                    // Define novamente a variável de sessão do usuário
                    $_SESSION["user"] = $user;

                    // Mostra os botões de logout e área pessoal
                    echo "
                        <div class='botao'>
                            <form action='./logout.php' method='post'> 
                                <input type='submit' value='Logout'>
                            </form>
                        </div>
                        <div class='botao'>
                            <form action='./PgUtilizador.php'>
                                <input type='submit' value='Área Pessoal'>
                            </form>
                        </div>
                    ";
                } else {
                    // Se o usuário não estiver logado, mostra os botões de login
                    echo "
                        <div class='botao'>
                            <form action='./PgLogin.php' method='post'>
                                <input type='submit' value='Entrar'>
                            </form>
                        </div>
                    ";
                }
            ?>
            
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <h1>Nossos Cursos</h1>
        <p>Explore os cursos disponíveis e inscreva-se para começar a aprender hoje mesmo!</p>
        
        <div class="courses-list">
            <div class="course-item">
                <h2>Curso de PHP</h2>
                <p>Curso introdutório de PHP.</p>
               
            </div>
            <div class="course-item">
                <h2>Curso de MySQL</h2>
                <p>Curso avançado de MySQL.</p>
                
            </div>
            <div class="course-item">
                <h2>Curso de HTML</h2>
                <p>Curso básico de HTML.</p>
                
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Cesaltino Lopes. Todos os direitos reservados.</p>
            
        </div>
    </footer>
</body>
</html>
