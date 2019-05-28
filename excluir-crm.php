<?php

    require "config.php";

    // excluir CRM

    $id_crm = $_GET['id_crm'];

    $consulta = $pdo->prepare("SELECT * FROM crm WHERE id_crm = :id_crm");
    $consulta->bindValue(':id_crm', $id_crm);
    $consulta->execute();

    $row = $consulta->fetch(PDO::FETCH_ASSOC);

    $ex = $pdo->prepare("DELETE FROM crm where id_crm = :id_crm");
    $ex->bindValue(':id_crm', $id_crm);

    if ($ex->execute()) {
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>CRM Apagado com Sucesso!</div>";
        header("Location: crm.php");
    }else{
        session_start();
        $_SESSION['msg'] = "<div id='msg-clear' class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>ERRO! Não foi possível apagar.</div>";
        header("Location: crm.php");
    }
    

?>

