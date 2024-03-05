<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha 1</title>
</head>
<body>
    <?php 
    function prencherVisualizarMatrixAleatoria(){
        //Gerar as dimensões aleatorias
        $linhas = rand(2, 5);
        $colunas = rand(3, 6);

        //Preencher a matriz com numeros aleatorios de 0 a 9
        $matriz = array();
        for ($i = 0; $i < $linhas; $i++){
            for($j = 0; $j < $colunas ; $j++){
                $matriz[$i][$j] = rand(0,9);
            }
        }
        //Visualizar a matrix
        echo "Matrix $linhas x $colunas: <br>";
        for($i = 0; $i < $linhas; $i++) {
            for($j = 0; $j < $colunas; $j++){
                echo "[". $matriz[$i][$j] . "]";
                if($j < $colunas -1){
                    echo "_"; //Adciona o separador "_" entre os elementos
                }
            }
            echo "<br>";
        }
    }

    //Chamar a função para preencher e visualizar a matrix
    prencherVisualizarMatrixAleatoria();
    ?>
</body>
</html>