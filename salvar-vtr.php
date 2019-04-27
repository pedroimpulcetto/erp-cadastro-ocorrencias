<?php

    require "config.php";   

    // SALVAR VIATURA

    $prefixo = $_POST['inputPrefixo'];
    $MM = $_POST['inputMM'];
    $placa = $_POST['inputPlaca'];

    $inserir = $pdo->prepare('insert into viatura(inputPrefixo, inputMM, inputPlaca)
        values (:inputPrefixo, :inputMM, :inputPlaca)');

    $inserir->bindValue(':inputPrefixo', $prefixo);
    $inserir->bindValue(':inputMM', $MM);
    $inserir->bindValue(':inputPlaca', $placa);

    if ($inserir->execute()) {
        echo "<h1>Viatura Cadastrada!</h1>";
        header('Refresh: 0; URL=viatura.php');     
    } else {
        echo "<h1>Erro ao cadastrar.</h1>";
    }


    
?>