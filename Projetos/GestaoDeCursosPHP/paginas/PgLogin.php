<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <title>Login - Gestão de Cursos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    session_start();

   

    // Verifica se o usuário já está logado
    if (isset($_SESSION["user"])) {

        
        switch ($_SESSION["tipo"]) {
            case ADMINISTRADOR:
        
            case DOCENTE:
               
            case ALUNO:
                header("Location: ./PgUtilizador.php"); 
                exit();
            case CLIENTE_NAO_VALIDO:
                // Redirecionar para página de usuário não válido
                header("Location: ./pagina_cliente_nao_valido.php");
                exit();
            default:
                session_destroy();
                header("Location: ./paginaInicial.php");
                exit();
        }
    }
    ?>
    <div id="login-box">
        <div id="login-cabecalho">Entrar</div>
        <form action="login.php" method="POST">
            <div class="input-div" id="input-user">
                Nome de utilizador:
                <input type="text" name="username" required />
            </div>
            <div class="input-div" id="input-pass">
                Password:
                <input type="password" name="password" required />
            </div>
            <div id="acoes">
                <input type="submit" value="Entrar">
                <div id="registo"><a href="./PgRegisto.php">Registe-se...</a></div>
                <br>
                <div id="volta"><a href="./paginaInicial.php">Página Principal</a></div>
            </div>
        </form>
    </div>
</body>
</html>
