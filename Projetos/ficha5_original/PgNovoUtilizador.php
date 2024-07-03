<?php
session_start();
if(isset($_SESSION["user"])){
    include "./base_dados/basedados.h";
    include "./ConstUtilizadores.php";
    // ==========================Quem é o utilizador==========================
    $sql = "SELECT tipoUtilizador FROM utilizador WHERE nomeUtilizador='".$_SESSION["user"]."'";
    // ====================================================
    $retval = mysqli_query( $conn, $sql );
   
    if(! $retval ){
        die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
    }
   
    $row = mysqli_fetch_array($retval);
    $tipoUtilizador = $row["tipoUtilizador"];
    $pode=true;
   
    if($tipoUtilizador!=ADMINISTRADOR){
        $pode=false;
        echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 000)</script>";
    }

    if($pode){
        echo'<div id="login-box">
        <div id="login-cabecalho">Novo Utilizador</div>
        <form action="novo_user.php" method="POST">
            <div class="input-div" id="input-user">
                Nome de utilizador:
                <input type="text" name="user"/>
            </div>
 
            <div class="input-div" id="input-user">
                Mail:
                <input type="text" name="mail"/>
            </div>

            <div class="input-div" id="input-user">
                Imagem:
                <input type="text" name="imagem"/>
            </div>

             <div class="input-div" id="input-user">
                Morada:
                <input type="text" name="morada"/>
            </div>
 
            <div class="input-div" id="input-pass">
                 Password:
                <input type="password" name="pass"/>
            </div>
 
            <div class="input-div" id="input-user">
                Telemovel:
                <input type="text" name="tlm"/>
            </div>
            
            <!--=====================Login=====================-->
            <div id="acoes">
                <input type="submit" value ="Criar">
                <br><div id = "volta"><a href="./pagina_inicial.php">Página Principal</a></div>
            </div>
        </form>
        </div>';
    }
}
else
    echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
?>
</body>
</html>