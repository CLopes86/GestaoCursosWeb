// login.php
<?php
session_start();
$usuario = $_POST['username'];
$senha = $_POST['password'];

// Simulação de verificação de usuário
if ($usuario === "admin" && $senha === "1234") {
    $_SESSION['usuario_logado'] = $usuario;
    header("Location: dashboard.php");
} else {
    echo "Login inválido!";
}
?>
