<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar-se</title>
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
                <li><a href="registo.php">Registrar-se</a></li>
            </ul>
        </nav>
        <div class="login">
            <button>Entrar</button>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <h1>Registrar-se</h1>
        <p>Preencha o formulário abaixo para criar sua conta.</p>
        
        <form action="processar_registro.php" method="POST" class="registro-form">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
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
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>
            </div>
            
            <button type="submit">Registrar</button>
        </form>
    </main>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Cesaltino Lopes. Todos os direitos reservados.</p>
           
        </div>
    </footer>
</body>
</html>
