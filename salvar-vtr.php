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
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Viatura Salva com Sucesso!</div>";
        header("Location: viatura.php");     
    } else {
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO! Não foi possível salvar.</div>";
        header("Location: viatura.php");
    }


    
?>