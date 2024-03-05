<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha 1</title>
</head>
<?php
    //Iniciar array como nomes de clubes de futebol
    $clubes = array("Sporting", "Benfica", "Porto", "Braga", "Boavista");

    //Exibir array original
    echo "Array Original: " . implode(", ", $clubes) . "<br>";

    //Ordenação alfabetica
    sort($clubes);
    echo "Array ordenado alfabeticamente: " .implode(", ", $clubes). "<br>";

    //Inserindo um novo nome em posição especifica
    $novoClube = "Famalicão";
    $posicaoInserir = 2;

    array_splice($clubes, $posicaoInserir, 0, $novoClube);
    echo "Array após inserção de '$novoClube' na posição $posicaoInserir:  " . implode(", ", $clubes). "<br>";

    //Remover um elemento pela posição
    $posicaoRemover = 3;
    array_splice($clubes, $posicaoRemover, 1);
    echo "Array após remoção da posição $posicaoRemover: ".implode(", ", $clubes) ."<br>";

    //Remover um elemento pelo nome
    $clubeRemover = "Benfica";
    $indiceRemover = array_search($clubeRemover,$clubes);

    if($indiceRemover !== false) {
        array_splice($clubes, $indiceRemover, 1);
        echo "Array após remoção de '$clubeRemover': " . implode(", ", $clubes) . "<br>";
    }else {
        echo "'$clubeRemover' não encontrado no array. <br>";
    }
    
?>
<body>
    
</body>
</html>