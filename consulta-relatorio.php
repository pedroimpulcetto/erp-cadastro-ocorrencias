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


$consulta = $pdo-> prepare("SELECT * FROM talao where inputRelDateDE = :inputRelDateDE, inputRelDateATE = :inputRelDateATE");
$consulta -> bindValue(':inputRelDateDE', "%$rDateDE%");
$consulta -> bindValue(':inputRelDateATE', "%$rDateATE%");
$consulta -> execute();

while ($row = $consulta -> fetch(PDO::FETCH_ASSOC)){
    ?>

    <h3></h3>

    <?php
        }


?>