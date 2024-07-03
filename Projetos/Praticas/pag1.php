<?php
 session_start();

 $nome = "Maria Augusta";

 $_SESSION["nome"] = $nome;

 echo "Pagina 1: a variavel nome tem ovalor = ".$_SESSION["nome"];
 echo "<br><br>";
 echo "<a href = 'pag2.php'> Saltar para a pagina 2 </>";
?>