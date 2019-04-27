<?php
    
    require "config.php";

    // SALVAR TALAO

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

    
    $inserir = $pdo->prepare('insert into talao(id_talao, inputNumTalao, inputData, inputHoraChamada, inputSolicitante, inputTel, inputEndereco, inputNum, inputBairro, inputAtendente, inputTipoOcorrencia, inputCod, inputVtr, inputHS, inputOS, inputHL, inputOL, inputSL, inputPS, inputSPS, inputHPB, inputOPB, inputNumVitimas, inputQruOcor, inputMotorista, inputComandante) values (:id_talao, :inputNumTalao, :inputData, :inputHoraChamada, :inputSolicitante, :inputTel, :inputEndereco, :inputNum, :inputBairro, :inputAtendente, :inputTipoOcorrencia, :inputCod, :inputVtr, :inputHS, :inputOS, :inputHL, :inputOL, :inputSL, :inputPS, :inputSPS, :inputHPB, :inputOPB, :inputNumVitimas, :inputQruOcor, :inputMotorista, :inputComandante)');

    $inserir->bindValue(':id_talao', 0);
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
        echo "<h1>Talão Cadastrado!</h1>";
        header('Refresh: 0; URL=index.php');     
    } else {
        echo "<h1>Erro ao cadastrar.</h1>";
    }


?>