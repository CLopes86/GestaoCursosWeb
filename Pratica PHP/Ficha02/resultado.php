<?php

// Define o array de candidatos
$candidatos = array(
    "Rafael" => array(
        "nome" => "Rafael",
        "cargo" => "Deputado",
        "partido" => "Partido A",
        
    ),
    "Maria" => array(
        "nome" => "Maria",
        "cargo" => "Músico",
        "partido" => "Partido B",
       
    ),

    
    "Carlos" => array(
        "nome" => "Carlos",
        "cargo" => "Desempregado",
        "partido" => "Partido B",
        
    ),

    "Leandro" => array(
        "nome" => "Leandro",
        "cargo" => "Professor",
        "partido" => "Partido A",
        
    ),

    "Alex" => array(
        "nome" => "Alex",
        "cargo" => "Actor",
        "partido" => "Partido A",
        
    ),
   
);

// Conta o número de candidatos
$votos = count($_POST['candidato']);

// Verifica se o número de votos é válido
if ($votos > 3) {
    echo "<h1>Voto Anulado</h1>";
    echo "<p>Você votou em mais de 3 candidatos.</p>";
    exit;
}

// Verifica se o usuário não selecionou nenhum candidato
elseif ($votos == 0) {
    echo "<h1>Voto em Branco</h1>";
    exit;
}

// Exibe a lista de candidatos votados
echo "<h1>Voto Confirmado</h1>";
echo "<p>Você votou em:</p>";

// Função para formatar a saída
function formatarCandidato($candidato, $candidatos) {
    return "<li>Candidato: " . $candidatos[$candidato]["nome"] . " - " . $candidatos[$candidato]["cargo"] . "<br>";
}

// Usa a função para formatar a lista de candidatos
foreach ($_POST['candidato'] as $candidato) {
    if (isset($candidato) && !empty($candidato)) {
        echo formatarCandidato($candidato, $candidatos);
    }
}

echo "</ul>";

?>