<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha 1</title>
</head>
<body>
    <?php
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
    function mostrarPrimosMenores($limite) {
        $totalPrimos = 0;

        echo "Numeros primos menores que $limite: <br>";

        for($i = 2; $i < $limite; $i ++) {
            if(isPrimo($i)) {
                echo "$i é primo<br>";
                $totalPrimos++;
            }
        }
        echo "Total = $totalPrimos números primos menores que $limite.<br>";
    } 

    mostrarPrimosMenores(7);
    ?>
</body>
</html>