<?php

require "config.php";

$rDateDE = $_POST['inputRelDateDE'];
$rDateATE = $_POST['inputRelDateATE'];
$rHoraDE = $_POST['inputRelHoraDE'];
$rHoraATE = $_POST['inputRelHoraATE'];
$rRua = $_POST['inputRelRua'];
$rBairro = $_POST['inputRelBairro'];
$rAtendente = $_POST['inputRelAtendente'];
$rTipoOcorrencia = $_POST['inputRelTipoOcorrencia'];
$rCod = $_POST['inputRelCod'];
$rVtr = $_POST['inputRelVtr'];
$rNumVitimas = $_POST['inputRelNumVitimas'];
$rMotorista = $_POST['inputRelMotorista'];
$rComandante = $_POST['inputRelComandante'];


$consulta = $pdo-> prepare("SELECT * FROM talao where inputRelDateDE = '':inputRelDateDE'");
$consulta -> bindValue(':inputRelDateDE', "%$rDateDE%");
$consulta ->execute();

echo "<table width=\"100%\" border class=\"table table-hover\">";

while ($row = $consulta -> fetch(PDO::FETCH_ASSOC)){

    echo "<tr>
            <td> <img src=\"img/$row[logo]\" width=80 heigth=30 <p>
                 <strong> Número: $row[cod] - Descrição: $row[descricao]</strong>
            </td>
                
            <td aling=\"center\"><a href=\"alterartimes.php?cod=$row[cod]\" class=\"btn btn-success btn-xs\"> Alterar </a> </td>

            <td aling=\"center\"> <a href=\"excluirtimes.php?cod=$row[cod]\" class=\"btn btn-danger btn-xs\" onclick=\"return confirm ('Confirma exclusão do registro?')\"> Excluir </a> </td>

            </tr>";
        
        }

        echo "</table>";

        rodape();
?>