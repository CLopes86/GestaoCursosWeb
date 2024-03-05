<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha 1</title>
</head>
<body>
    <?php 
    echo "Numeros pares usando  a instrução for: <br> ";
    for($i = 2; $i <= 20; $i += 2){
        echo   "-" . $i ."<br>";
    }
    echo "Numeros pares usando a instrução if: <br> ";
    for($i = 1; $i <= 20; $i ++){
        if($i % 2 == 0){
            echo "-" . $i . "<br> ";
        }
    }
     ?>

</body>
</html>