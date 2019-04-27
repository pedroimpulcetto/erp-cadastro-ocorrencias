<?php
    
    require "config.php";

    // SALVAR EFETIVO

    $postGrad = $_POST['inputPostGrad'];
    $re = $_POST['inputRE'];
    $nomeCompleto = $_POST['inputNomeCompleto'];
    $dataAdmissao = $_POST['inputDataAdmissao'];
    $fone = $_POST['inputFone'];
    $cel = $_POST['inputCel'];
    $dn = $_POST['inputDN'];
    $email = $_POST['inputEmail'];
    
    $inserir = $pdo->prepare('insert into efetivo(inputPostGrad, inputRE, inputNomeCompleto, inputDataAdmissao, inputFone, inputCel, inputDN, inputEmail) values (:inputPostGrad, :inputRE, :inputNomeCompleto, :inputDataAdmissao, :inputFone, :inputCel, :inputDN, :inputEmail)');

    $inserir->bindValue(':inputPostGrad', $postGrad);
    $inserir->bindValue(':inputRE', $re);
    $inserir->bindValue(':inputNomeCompleto', $nomeCompleto);
    $inserir->bindValue(':inputDataAdmissao', $dataAdmissao);
    $inserir->bindValue(':inputFone', $fone);
    $inserir->bindValue(':inputCel', $cel);
    $inserir->bindValue(':inputDN', $dn);
    $inserir->bindValue(':inputEmail', $email);

    if ($inserir->execute()) {
        echo "<h1>Efetivo Cadastrado!</h1>";
        header('Refresh: 0; URL=efetivo.php');     
    } else {
        echo "<h1>Erro ao cadastrar.</h1>";
    }


?>