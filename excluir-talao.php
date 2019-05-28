<?php

    require "config.php";

    // excluir TALAO

    $talao = $_GET['id_talao'];

    $consulta = $pdo->prepare("SELECT * FROM talao WHERE id_talao = :id_talao");
    $consulta->bindValue(':id_talao', $talao);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM talao where id_talao = :id_talao");
    $ex->bindValue(':id_talao', $talao);

    if ($ex->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Talão Apagado com Sucesso!</div>";
        header("Location: index.php");
    }else{
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível apagar.</div>";
        header("Location: index.php");
    }
    

?>