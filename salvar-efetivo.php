<?php
    
    require "config.php";

    // SALVAR EFETIVO

    $postGrad = $_POST['inputPostGrad'];
    $re = $_POST['inputEditRE'];
    $nomeCompleto = $_POST['inputNomeCompleto'];
    $dataAdmissao = $_POST['inputDataAdmissao'];
    $fone = $_POST['inputFone'];
    $cel = $_POST['inputCel'];
    $dn = $_POST['inputDN'];
    $email = $_POST['inputEmail'];

    // alterando para letra MAIUSCULA
    $nomeCompleto = strtoupper($nomeCompleto);
    $postGrad = strtoupper($postGrad);
    
    $inserir = $pdo->prepare('INSERT INTO efetivo(inputPostGrad, inputRE, inputNomeCompleto, inputDataAdmissao, inputFone, inputCel, inputDN, inputEmail) VALUES (:inputPostGrad, :inputRE, :inputNomeCompleto, :inputDataAdmissao, :inputFone, :inputCel, :inputDN, :inputEmail)');

    $inserir->bindValue(':inputPostGrad', $postGrad);
    $inserir->bindValue(':inputRE', $re);
    $inserir->bindValue(':inputNomeCompleto', $nomeCompleto);
    $inserir->bindValue(':inputDataAdmissao', $dataAdmissao);
    $inserir->bindValue(':inputFone', $fone);
    $inserir->bindValue(':inputCel', $cel);
    $inserir->bindValue(':inputDN', $dn);
    $inserir->bindValue(':inputEmail', $email);

    if ($inserir->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Militar Salvo com Sucesso!</div>";
        header("Location: efetivo.php");     
    } else {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível salvar.</div>";
        header("Location: efetivo.php");
    }


?>