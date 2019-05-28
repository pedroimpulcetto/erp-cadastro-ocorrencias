<?php

    require "config.php";

    // excluir VIATURA

    $viatura = $_GET['inputPrefixo'];

    $consulta = $pdo->prepare("SELECT * FROM viatura WHERE inputPrefixo = :inputPrefixo");
    $consulta->bindValue(':inputPrefixo', $viatura);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM viatura where inputPrefixo = :inputPrefixo");
    $ex->bindValue(':inputPrefixo', $viatura);

    if ($ex->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Viatura Apagada com Sucesso!</div>";
        header("Location: viatura.php");
    }else{
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível apagar.</div>";
        header("Location: viatura.php");
    }
    

?>