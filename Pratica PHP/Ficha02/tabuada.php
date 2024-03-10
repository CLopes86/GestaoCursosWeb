<?php 
//Recebe o número digitado pelo usuario
$numero = $_POST['numero'];

//Verifica se o numero esta entre 1 e 10
if($numero <1 || $numero > 10) {
    echo "<p>Erro: Número invalido. Por favor, Digite um numero entre 1 e 10.</p>";
    exit;
}

//Exibe a tabuada do número
echo "<h2>Tabuada do {$numero}</h2>";
echo "<ul>";
for($i = 1; $i <= 10; $i++) {
    echo "<li>{$numero} x {$i} = " . ($numero * $i) . "</li>";
}
echo "</ul>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada Aleatoria!</title>
</head>
<body>
    
</body>
</html>