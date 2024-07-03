<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Gestão de Utilizadores</title>
  <link rel="stylesheet" href="estilos.css">
 
</head>
<body>
    <!-- GRAFISMO CABECALHO -->
    <div id="cabecalho">
        <a href='../index.php'>
            <div id="logo"></div>
        </a>
        <div class="input-div">
            <div id="botoes">
                <?php
                ob_start();
                session_start();
                if (isset($_SESSION["user"])) {
                    echo "
                    <div id='botao'>
                        <form action='./logout.php'>
                            <input type='submit' value='Logout'>
                        </form>
                    </div>
                    <div id='botao'>
                        <form action='./PgUtilizador.php'>
                            <input type='submit' value='Página Inicial'>
                        </form>
                    </div>";
                } else {
                    echo "<script> setTimeout(function () { window.location.href = './paginaInicial.php'; }, 2000)</script>";
                }
                ?>
                <div id='botao'>
                    <form action="../contatos.php">
                        <input type='submit' value='Contactos'>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- GRAFISMO CORPO -->
    <div id="corpo">
        <form action="./PgNovoUtilizador.php">
            <input type='submit' value='Novo Utilizador' id="btnNv">
        </form>
        <div id="tabela">
            <?php
            if (isset($_SESSION["user"])) {
                include "../basedados/basedados.h";
                include "./constantes.php";

                // Verifica o tipo de utilizador
                $sql = "SELECT tipoUtilizador FROM utilizador WHERE nomeUtilizador='" . $_SESSION["user"] . "'";
                $retval = mysqli_query($conn, $sql);
                if (! $retval) {
                    die('Could not get data: ' . mysqli_error($conn));
                }
                $row = mysqli_fetch_array($retval);
                $tipoUtilizador = $row["tipoUtilizador"];
                $pode = ($tipoUtilizador == ADMINISTRADOR);

                if ($pode) {
                    $sql = "SELECT * FROM utilizador";
                    $retval = mysqli_query($conn, $sql);
                    if (! $retval) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    echo "<table width='100%' id='t01'>
                    <tr>
                        <th>Nome Utilizador:</th>
                        <th>Tipo:</th>
                        <th>Telemóvel:</th>
                        <th>Validar:</th>
                        <th>Editar:</th>
                        <th>(Des)Promover:</th>
                    </tr>";
                    while ($row = mysqli_fetch_array($retval)) {
                        echo "
                        <tr>
                            <td>" . $row["nomeUtilizador"] . "</td>
                            <td>" . getDescricaoUtilizador($row["tipoUtilizador"]) . "</td>
                            <td>" . $row["telemovel"] . "</td>";

                        // VALIDAR
                        if ($row["tipoUtilizador"] == CLIENTE_NAO_VALIDO)
                            echo "<td><a href='./validar.php?IdUser=" . $row["nomeUtilizador"] . "'><img src='./imgs/validar.png' width=50 height=50></a></td>";
                        else
                            echo "<td></td>";

                        // EDITAR
                        if ($row["tipoUtilizador"] != CLIENTE_APAGADO)
                            echo "<td><a href='preparaEditar.php?IdUser=" . $row["nomeUtilizador"] . "'><img src='./imgs/editar.png' width=50 height=50></a></td>";
                        else
                            echo "<td></td>";

                        // PROMOVER
                        if ($row["tipoUtilizador"] != ADMINISTRADOR)
                            echo "<td><a href='PgDespromover.php?IdUser=" . $row["nomeUtilizador"] . "'><img src='./imgs/promover.png' width=50 height=50></a></td>";
                        else
                            echo "<td></td>";

                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 0)</script>";
                }
            }

            function getDescricaoUtilizador($tipoNumerico) {
                switch ($tipoNumerico) {
                    case ADMINISTRADOR:
                        return "Administrador";
                    case FUNCIONARIO:
                        return "Funcionário";
                    case SOCIO:
                        return "Socio";
                    case CLIENTE:
                        return "Cliente validado";
                    case CLIENTE_APAGADO:
                        return "Utilizador apagado";
                    case CLIENTE_NAO_VALIDO:
                        return "Cliente não validado";
                    default:
                        return "Desconhecido";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
