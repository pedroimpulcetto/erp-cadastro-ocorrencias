<?php

    require "config.php";   

    // SALVAR VIATURA

    $prefixo = $_POST['inputPrefixo'];
    $MM = $_POST['inputMM'];
    $placa = $_POST['inputPlaca'];

    $inserir = $pdo->prepare('insert into viatura(inputPrefixo, inputMM, inputPlaca)
        values (:inputPrefixo, :inputMM, :inputPlaca)');

    $inserir->bindValue(':inputPrefixo', $prefixo);
    $inserir->bindValue(':inputMM', $MM);
    $inserir->bindValue(':inputPlaca', $placa);

    if ($inserir->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Viatura Salva com Sucesso!</div>";
        header("Location: viatura.php");     
    } else {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível salvar.</div>";
        header("Location: viatura.php");
    }


    
?>