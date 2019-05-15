<?php

    require "config.php";

    // SALVAR EDIT TALAO

    $id_talao = $_POST['id_talao'];
    $numTalao = $_POST['inputNumTalao'];
    $data = $_POST['inputData'];
    $horaChamada = $_POST['inputHoraChamada'];
    $solicitante = $_POST['inputSolicitante'];
    $tel = $_POST['inputTel'];
    $endereco = $_POST['inputEndereco'];
    $num = $_POST['inputNum'];
    $bairro = $_POST['inputBairro'];
    $atendente = $_POST['inputAtendente'];
    $tipoOcorrencia = $_POST['inputTipoOcorrencia'];
    $cod = $_POST['inputCod'];
    $vtr = $_POST['inputVtr'];
    $hs = $_POST['inputHS'];
    $os = $_POST['inputOS'];
    $hl = $_POST['inputHL'];
    $ol = $_POST['inputOL'];
    $sl = $_POST['inputSL'];
    $ps = $_POST['inputPS'];
    $sPs = $_POST['inputSPS'];
    $hpb = $_POST['inputHPB'];
    $opb = $_POST['inputOPB'];
    $numVitimas = $_POST['inputNumVitimas'];
    $qruOcor = $_POST['inputQruOcor'];
    $motorista = $_POST['inputMotorista'];
    $comandante = $_POST['inputComandante'];

    // alterando para letra MAIUSCULA
    $solicitante = strtoupper($solicitante);
    $endereco = strtoupper($endereco);
    $bairro = strtoupper($bairro);
    $atendente = strtoupper($atendente);
    $motorista = strtoupper($motorista);
    $comandante = strtoupper($comandante);

    $sql = "UPDATE talao SET inputNumTalao = :inputNumTalao, inputData = :inputData, inputHoraChamada = :inputHoraChamada, inputSolicitante = :inputSolicitante, inputTel = :inputTel, inputEndereco = :inputEndereco, inputNum = :inputNum, inputBairro = :inputBairro, inputAtendente = :inputAtendente, inputTipoOcorrencia = :inputTipoOcorrencia, inputCod = :inputCod, inputVtr = :inputVtr, inputHS = :inputHS, inputOS = :inputOS, inputHL = :inputHL, inputOL = :inputOL, inputSL = :inputSL, inputPS = :inputPS, inputSPS = :inputSPS, inputHPB = :inputHPB, inputOPB = :inputOPB, inputNumVitimas = :inputNumVitimas, inputQruOcor = :inputQruOcor, inputMotorista = :inputMotorista, inputComandante = :inputComandante WHERE id_talao = :id_talao";

    $alteracao = $pdo->prepare($sql);
    
    $alteracao->bindValue(':id_talao', $id_talao);
    $alteracao->bindValue(':inputNumTalao', $numTalao);
    $alteracao->bindValue(':inputData', $data);
    $alteracao->bindValue(':inputHoraChamada', $horaChamada);
    $alteracao->bindValue(':inputSolicitante', $solicitante);
    $alteracao->bindValue(':inputTel', $tel);
    $alteracao->bindValue(':inputEndereco', $endereco);
    $alteracao->bindValue(':inputNum', $num);
    $alteracao->bindValue(':inputBairro', $bairro);
    $alteracao->bindValue(':inputAtendente', $atendente);
    $alteracao->bindValue(':inputTipoOcorrencia', $tipoOcorrencia);
    $alteracao->bindValue(':inputCod', $cod);
    $alteracao->bindValue(':inputVtr', $vtr);
    $alteracao->bindValue(':inputHS', $hs);
    $alteracao->bindValue(':inputOS', $os);
    $alteracao->bindValue(':inputHL', $hl);
    $alteracao->bindValue(':inputOL', $ol);
    $alteracao->bindValue(':inputSL', $sl);
    $alteracao->bindValue(':inputPS', $ps);
    $alteracao->bindValue(':inputSPS', $sPs);
    $alteracao->bindValue(':inputHPB', $hpb);
    $alteracao->bindValue(':inputOPB', $opb);
    $alteracao->bindValue(':inputNumVitimas', $numVitimas);
    $alteracao->bindValue(':inputQruOcor', $qruOcor);
    $alteracao->bindValue(':inputMotorista', $motorista);
    $alteracao->bindValue(':inputComandante', $comandante);

    if ($alteracao->execute()) {
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Talão Alterado com Sucesso!</div>";
        header("Location: index.php");
    }else {
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>ERRO! Não foi possível alterar.</div>";
        header("Location: index.php");        
    }

?>