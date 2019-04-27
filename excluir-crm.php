<?php

    require "config.php";

    // excluir CRM

    $crm = $_GET['inputCRM'];

    $consulta = $pdo->prepare("SELECT * FROM crm WHERE inputCRM = :inputCRM");
    $consulta->bindValue(':inputCRM', $crm);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM crm where inputCRM = :inputCRM");
    $ex->bindValue(':inputCRM', $crm);

    if ($ex->execute()) {
        echo "<h1>CRM Excluído! Aguarde...</h1>";
            header("Refresh: 0; URL=crm.php");
    }else{
        echo "<h1>Erro ao excluir!</h1>";
    }
    

?>