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
        echo "<h1>Talão Excluído! Aguarde...</h1>";
            header("Refresh: 0; URL=index.php");
    }else{
        echo "<h1>Erro ao excluir!</h1>";
    }
    

?>