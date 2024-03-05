<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha 1</title>
</head>
<body>
    <?php

    //Funçao para verificar se um numero é primo
    function isPrimo($numero){
        if($numero < 2){
            return false; //Numeros menores que 2 não sao primos
        }
        
        for($i = 2; $i <= sqrt($numero); $i++){
            if ($numero %  $i == 0){
                return false; //Encontrou um divisor, portanto não é primo
            }
        }

        return true; // Se não encontrou nenhum divisor 
    } 

    //Exemplos
    $num1 = 7;
    $num2 = 12;

    echo "$num1 é " . (isPrimo($num1) ? "primo" : "não primo") . "<br>";
    echo "$num2 é " . (isPrimo($num2) ? "primo" : "não primo");
    ?>
</body>
</html>