<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher um cor</title>
</head>



    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        /*Estilo dos botões*/
        button {
            padding: 10px 20 px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        /*Cor verde pré-selecionada*/
        #verde {
            background: green;
            color: white;
        }

        /*Estilo para outras cores */
        #vermelho {
            background: red;
            color: white;
        }

        #preto {
            background: black;
            color: white;
        }

        #azul {
            background: blue;
            color: white;
        }

    </style>


<body>
    <h1>Escolha uma cor: </h1>
    <button id="verde"> Verde </button>
    <button id="vermelho">Vermelho</button>
   
    <button id="preto"> Preto </button>
    <button id ="azul"> Azul</button>

    <script>
        //Função para atualizar a cor de fundo da pagina
        function escolherCor(cor){
            document.body.style.background = cor;
        }

        //Atribui a função escolherCor ao evento onclik de cada botão
        document.getElementById("verde").onclick = function(){ escolherCor("green"); };
        document.getElementById("vermelho").onclick = function(){ escolherCor("red"); };
        document.getElementById("preto").onclick = function(){ escolherCor("black"); };
        document.getElementById("azul").onclick = function(){ escolherCor("blue"); };
    </script>

</body>
</html>