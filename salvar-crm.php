<?php
    
    require "config.php";

    // SALVAR CRM

    $id_crm = $_POST['id_crm'];
    $nomeMedico = $_POST['inputNomeMedico'];
    $crm = $_POST['inputCRM'];

    // alterando NOME MÉDICO para letra MAIUSCULA
    $nomeMedico = strtoupper($nomeMedico);
    
    $inserir = $pdo->prepare('INSERT INTO crm(inputNomeMedico, inputCRM, id_crm) VALUES (:inputNomeMedico, :inputCRM, :id_crm)');

    $inserir->bindValue(':inputNomeMedico', $nomeMedico);
    $inserir->bindValue(':inputCRM', $crm);
    $inserir->bindValue(':id_crm', $id_crm);

    if ($inserir->execute()) {
        echo "<h1>CRM Cadastrado!</h1>";
        header('Refresh: 0; URL=crm.php');     
    } else {
        echo "<h1>Erro ao cadastrar.</h1>";
    }


?>