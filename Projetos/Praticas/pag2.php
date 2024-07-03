<?php
session_start();

echo "Pagina 2 : a variavel nome tem o valor = ".$_SESSION["nome"];
echo "<br><br>";
echo "<a href='pag1.php'>Saltar para a pagina 1</>";

?>