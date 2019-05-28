<?php

    require "config.php";

    // excluir EFETIVO

    $id_efetivo = $_GET['id_efetivo'];

    $consulta = $pdo->prepare("SELECT * FROM efetivo WHERE id_efetivo = :id_efetivo");
    $consulta->bindValue(':id_efetivo', $id_efetivo);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM efetivo where id_efetivo = :id_efetivo");
    $ex->bindValue(':id_efetivo', $id_efetivo);

    if ($ex->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>Militar Apagado com Sucesso!</div>";
        header("Location: efetivo.php");
    }else{
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível apagar.</div>";
        header("Location: efetivo.php");
    }
    

?>