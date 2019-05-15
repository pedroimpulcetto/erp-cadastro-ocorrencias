<?php

    require "config.php";

    // excluir VIATURA

    $viatura = $_GET['inputPrefixo'];

    $consulta = $pdo->prepare("SELECT * FROM viatura WHERE inputPrefixo = :inputPrefixo");
    $consulta->bindValue(':inputPrefixo', $viatura);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM viatura where inputPrefixo = :inputPrefixo");
    $ex->bindValue(':inputPrefixo', $viatura);

    if ($ex->execute()) {
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Viatura Apagada com Sucesso!</div>";
        header("Location: viatura.php");
    }else{
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO! Não foi possível apagar.</div>";
        header("Location: viatura.php");
    }
    

?>