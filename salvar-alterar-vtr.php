<?php

    require "config.php";

    // SALVAR EDIT VTR

    $prefixo = $_POST['inputPrefixo'];
    $MM = $_POST['inputMM'];
    $placa = $_POST['inputPlaca'];

    // alterando para letra MAIUSCULA
    $prefixo = strtoupper($prefixo);
    $placa = strtoupper($placa);
    $MM = strtoupper($MM);

    $sql = "UPDATE viatura SET inputPrefixo = :inputPrefixo, inputMM = :inputMM, inputPlaca = :inputPlaca WHERE inputPrefixo = :inputPrefixo";

    $alteracao = $pdo->prepare($sql);
    
    $alteracao->bindValue(':inputPrefixo', $prefixo);
    $alteracao->bindValue(':inputMM', $MM);
    $alteracao->bindValue(':inputPlaca', $placa);

    if ($alteracao->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Viatura Alterada com Sucesso!</div>";
        header("Location: viatura.php");
    }else {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível alterar.</div>";
        header("Location: viatura.php");        
    }

?>