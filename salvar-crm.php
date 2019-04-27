<?php
    
    require "config.php";

    // SALVAR CRM

    $nomeMedico = $_POST['inputNomeMedico'];
    $crm = $_POST['inputCRM'];
    
    $inserir = $pdo->prepare('insert into crm(inputNomeMedico, inputCRM) values (:inputNomeMedico, :inputCRM)');

    $inserir->bindValue(':inputNomeMedico', $nomeMedico);
    $inserir->bindValue(':inputCRM', $crm);

    if ($inserir->execute()) {
        echo "<h1>CRM Cadastrado!</h1>";
        header('Refresh: 0; URL=crm.php');     
    } else {
        echo "<h1>Erro ao cadastrar.</h1>";
    }


?>