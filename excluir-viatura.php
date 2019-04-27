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
        echo "<h1>Viatura Excluída! Aguarde...</h1>";
            header("Refresh: 0; URL=viatura.php");
    }else{
        echo "<h1>Erro ao excluir!</h1>";
    }
    

?>