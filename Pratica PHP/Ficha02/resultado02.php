<?php

// Define os arrays de cidades e populações
$cidades = $_POST['cidades'];
$populacoes = $_POST['populacoes'];

// Combina os arrays em um único array associativo
$cidades_populacao = array_combine($cidades, $populacoes);

// Ordena as cidades por ordem alfabética
ksort($cidades_populacao);

// Exibe as cidades em ordem alfabética
echo "<h2>Cidades por ordem alfabética</h2>";
echo "<table>";
echo "<tr><th>Cidade</th><th>População</th></tr>";
foreach ($cidades_populacao as $cidade => $populacao) {
    echo "<tr><td>$cidade</td><td>$populacao</td></tr>";
}
echo "</table>";

// Ordena as cidades por ordem decrescente de população
arsort($cidades_populacao);

// Exibe as cidades por ordem decrescente de população
echo "<h2>Cidades por ordem decrescente de população</h2>";
echo "<table>";
echo "<tr><th>Cidade</th><th>População</th></tr>";
foreach ($cidades_populacao as $cidade => $populacao) {
    echo "<tr><td>$cidade</td><td>$populacao</td></tr>";
}
echo "</table>";

?>
