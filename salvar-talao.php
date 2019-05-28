<?php
    
    require "config.php";

    // SALVAR TALAO

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
    
    $inserir = $pdo->prepare('INSERT INTO talao(id_talao, inputNumTalao, inputData, inputHoraChamada, inputSolicitante, inputTel, inputEndereco, inputNum, inputBairro, inputAtendente, inputTipoOcorrencia, inputCod, inputVtr, inputHS, inputOS, inputHL, inputOL, inputSL, inputPS, inputSPS, inputHPB, inputOPB, inputNumVitimas, inputQruOcor, inputMotorista, inputComandante) VALUES (:id_talao, :inputNumTalao, :inputData, :inputHoraChamada, :inputSolicitante, :inputTel, :inputEndereco, :inputNum, :inputBairro, :inputAtendente, :inputTipoOcorrencia, :inputCod, :inputVtr, :inputHS, :inputOS, :inputHL, :inputOL, :inputSL, :inputPS, :inputSPS, :inputHPB, :inputOPB, :inputNumVitimas, :inputQruOcor, :inputMotorista, :inputComandante)');

    $inserir->bindValue(':id_talao', $id_talao);
    $inserir->bindValue(':inputNumTalao', $numTalao);
    $inserir->bindValue(':inputData', $data);
    $inserir->bindValue(':inputHoraChamada', $horaChamada);
    $inserir->bindValue(':inputSolicitante', $solicitante);
    $inserir->bindValue(':inputTel', $tel);
    $inserir->bindValue(':inputEndereco', $endereco);
    $inserir->bindValue(':inputNum', $num);
    $inserir->bindValue(':inputBairro', $bairro);
    $inserir->bindValue(':inputAtendente', $atendente);
    $inserir->bindValue(':inputTipoOcorrencia', $tipoOcorrencia);
    $inserir->bindValue(':inputCod', $cod);
    $inserir->bindValue(':inputVtr', $vtr);
    $inserir->bindValue(':inputHS', $hs);
    $inserir->bindValue(':inputOS', $os);
    $inserir->bindValue(':inputHL', $hl);
    $inserir->bindValue(':inputOL', $ol);
    $inserir->bindValue(':inputSL', $sl);
    $inserir->bindValue(':inputPS', $ps);
    $inserir->bindValue(':inputSPS', $sPs);
    $inserir->bindValue(':inputHPB', $hpb);
    $inserir->bindValue(':inputOPB', $opb);
    $inserir->bindValue(':inputNumVitimas', $numVitimas);
    $inserir->bindValue(':inputQruOcor', $qruOcor);
    $inserir->bindValue(':inputMotorista', $motorista);
    $inserir->bindValue(':inputComandante', $comandante);

    if ($inserir->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Talão Salvo com Sucesso!</div>";
        header("Location: index.php");     
    } else {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível salvar.</div>";
        header("Location: index.php");
    }


?>