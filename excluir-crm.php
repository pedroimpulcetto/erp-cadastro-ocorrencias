<?php

    require "config.php";

    // excluir CRM

    $id_crm = $_GET['id_crm'];

    $consulta = $pdo->prepare("SELECT * FROM crm WHERE id_crm = :id_crm");
    $consulta->bindValue(':id_crm', $id_crm);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM crm where id_crm = :id_crm");
    $ex->bindValue(':id_crm', $id_crm);

    if ($ex->execute()) {
        echo "<h1>CRM Excluído! Aguarde...</h1>";
            header("Refresh: 0; URL=crm.php");
    }else{
        echo "<h1>Erro ao excluir!</h1>";
    }
    

?>