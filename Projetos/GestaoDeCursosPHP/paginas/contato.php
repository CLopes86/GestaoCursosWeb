<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
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
        <h1>Entre em Contato Conosco</h1>
        
        <section class="contact-details">
            <div class="contact-item">
                <h2>Cursos de Formação</h2>
                <p>Campus da Talagueira</p>
                <p>Avenida do Empresário</p>
                <p> Castelo Branco</p>
                <p>6000-767</p>
            </div>
            
            <div class="contact-item">
                <h2>272 339 300</h2>
                <p>965 956 977</p>
            </div>
            
            <div class="contact-item">
                <h2>Email</h2>
                <p>est@ipcb.pt</p>
            </div>
            
            <div class="contact-item">
                <h2>Redes Sociais</h2>
                <p>
                    <a href="https://pt.linkedin.com/school/politecnico-castelo-branco/" target="_blank">Linkedin</a><br>
                    
                </p>
            </div>
        </section>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Cesaltino Lopes. Todos os direitos reservados.</p>
            
        </div>
    </footer>
</body>
</html>
