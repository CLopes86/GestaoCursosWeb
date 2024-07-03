<?php
include "./base_dados/basedados.h";

if(strcmp($_POST["pass"],"") != 0 || strcmp($_POST["conf_pass"],"") != 0){
    if(strcmp($_POST["pass"],$_POST["conf_pass"])== 0){
//Password pode ser modificada
        $sql = "UPDATE utilizador
        SET

mail='".$_POST["email"]."',
imagem='".$_POST["imagem"]."',
morada='".$_POST["morada"]."',
pass='".md5($_POST["pass"])."',
telemovel='".$_POST["telemovel"]."'
WHERE nomeUtilizador='".$_POST["IdUser"]."'";

$retval = mysqli_query( $conn, $sql );

if(! $retval ){
die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
}

}else{
//Passwords incompatíveis
echo " <script> alert ('ERRO! Passwords incompatíveis!') </script>";
echo "<script> setTimeout(function () { window.location.href = './DadosPessoais.php'; }, 0000)</script>";
}

}
else {
$sql = "UPDATE utilizador
SET
mail='".$_POST["email"]."',
imagem='".$_POST["imagem"]."',
morada='".$_POST["morada"]."',
telemovel='".$_POST["telemovel"]."'
WHERE nomeUtilizador='".$_POST["IdUser"]."'";
$retval = mysqli_query( $conn, $sql );
if(! $retval ){
die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
}
}
?>