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
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>CRM Alterado com Sucesso!</div>";
        header("Location: crm.php");
    }else {
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO! Não foi possível alterar.</div>";
        header("Location: crm.php");        
    }

?>