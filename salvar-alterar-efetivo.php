<?php

    require "config.php";

    // SALVAR EDIT CRM

    $id_efetivo = $_POST['inputEditId'];
    $postGrad = $_POST['inputPostGrad'];
    $re = $_POST['inputRE'];
    $nomeCompleto = $_POST['inputNomeCompleto'];
    $dataAdmissao = $_POST['inputDataAdmissao'];
    $fone = $_POST['inputFone'];
    $cel = $_POST['inputCel'];
    $dn = $_POST['inputDN'];
    $email = $_POST['inputEmail'];

    // alterando para letra MAIUSCULA
    $nomeCompleto = strtoupper($nomeCompleto);
    $postGrad = strtoupper($postGrad);

    $sql = "UPDATE efetivo SET inputPostGrad = :inputPostGrad, inputRE = :inputRE, inputNomeCompleto = :inputNomeCompleto, inputDataAdmissao = :inputDataAdmissao, inputFone = :inputFone, inputCel = :inputCel, inputDN = :inputDN, inputEmail = :inputEmail WHERE id_efetivo = :id_efetivo";

    $alteracao = $pdo->prepare($sql);
    
    $alteracao->bindValue(':id_efetivo', $id_efetivo);
    $alteracao->bindValue(':inputPostGrad', $postGrad);
    $alteracao->bindValue(':inputRE', $re);
    $alteracao->bindValue(':inputNomeCompleto', $nomeCompleto);
    $alteracao->bindValue(':inputDataAdmissao', $dataAdmissao);
    $alteracao->bindValue(':inputFone', $fone);
    $alteracao->bindValue(':inputCel', $cel);
    $alteracao->bindValue(':inputDN', $dn);
    $alteracao->bindValue(':inputEmail', $email);
    
    if ($alteracao->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Militar Alterado com Sucesso!</div>";
        header("Location: efetivo.php");
    }else {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível alterar.</div>";
        header("Location: efetivo.php");        
    }

?>