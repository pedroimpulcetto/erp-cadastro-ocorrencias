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
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>CRM Salvo com Sucesso!</div>";
        header("Location: crm.php");     
    } else {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível salvar.</div>";
        header("Location: crm.php");
    }


?>