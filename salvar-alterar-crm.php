<?php

    require "config.php";

    // SALVAR EDIT CRM

    $id_crm = $_POST['inputEditId'];
    $nomeMedico = $_POST['inputNomeMedico'];
    $crm = $_POST['inputCRM'];

    // alterando NOME MÉDICO para letra MAIUSCULA
    $nomeMedico = strtoupper($nomeMedico);

    $sql = "UPDATE crm SET inputNomeMedico = :inputNomeMedico, inputCRM = :inputCRM WHERE id_crm = :id_crm";

    $alteracao = $pdo->prepare($sql);
    
    $alteracao->bindValue(':id_crm', $id_crm);
    $alteracao->bindValue(':inputNomeMedico', $nomeMedico);
    $alteracao->bindValue(':inputCRM', $crm);

    if ($alteracao->execute()) {
        echo "<h1>CRM Alterado!</h1>";
        header("Refresh: 0; URL=crm.php");
    }else {
            echo "<h1>ERRO ao alterar o CRM.</h1>";
    }

?>