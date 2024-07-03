<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo - Gestão de Cursos PHP</title>
    <link rel="stylesheet" href="estilos.css">

</head>
<body>
    <!-- Cabeçalho da página com logo, menu de navegação e botão de login -->
    <header id="cabecalho">
        <div class="logo">
            <!-- Logo da empresa -->
            <img src="imgs/logo.png" alt="Logo">
        </div>
        <nav>
            <!-- Menu de navegação -->
            <ul>
                <li><a href="paginaInicial.php">Inicio</a></li>
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
        <!-- Botão de login -->
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
    <!-- Conteúdo da página -->
    <main class="main-content">
        <h1>Registrar-se</h1>
        <form class="registro-form" action="processa_registro.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone">
            </div>
            <button type="submit">Registrar</button>
        </form>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Cesaltino Lopes. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>