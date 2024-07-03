<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cidades = $_POST["cidades"];
    $populacoes = $_POST["populacoes"];

    $cidades_populacoes = array_combine($cidades, $populacoes);

    ksort($cidades_populacoes);
    echo "<h2>Cidades por ordem alfabetica: </h2>";
    echo "<ul>";
    foreach($cidades_populacoes as $cidade => $populacao) {
        echo "<li>$cidade - Populaçao: $populacao</li>";

    }
    echo "</ul>";

    asort($cidades_populacoes);
    echo "<h2> Cidades por população (decrescente): </h2>";
    echo "<ul>";
    foreach($cidades_populacoes as $ciade => $populacao) {
        echo "<li>$cidade - População: $populacao</li>";
    }
    echo "</ul>";

    
}
?>