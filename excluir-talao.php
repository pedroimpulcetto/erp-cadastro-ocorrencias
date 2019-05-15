<?php

    require "config.php";

    // excluir TALAO

    $talao = $_GET['id_talao'];

    $consulta = $pdo->prepare("SELECT * FROM talao WHERE id_talao = :id_talao");
    $consulta->bindValue(':id_talao', $talao);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM talao where id_talao = :id_talao");
    $ex->bindValue(':id_talao', $talao);

    if ($ex->execute()) {
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Talão Apagado com Sucesso!</div>";
        header("Location: index.php");
    }else{
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO! Não foi possível apagar.</div>";
        header("Location: index.php");
    }
    

?>