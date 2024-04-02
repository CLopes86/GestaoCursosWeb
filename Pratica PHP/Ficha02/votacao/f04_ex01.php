

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da verificação</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <h1>Resultado da verificação</h1>
    </header>
    
    <main>
        
    <?php

        // Recebe os dados do fomulario
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        //Verifica se idade é maior ou igual a 18
        if($idade >= 18){
             $mensagem = "{$nome}, podes votar!";
        } else {
             $mensagem = "{$nome}, não podes votar!";
        }
    ?>
    </main>
    <p><?php echo $mensagem?></p>
    <p><a href="javascript:history.go(-1)">Voltar</a></p>
</body>
</html>