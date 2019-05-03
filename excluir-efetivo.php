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
        echo "<h1>Militar Excluído! Aguarde...</h1>";
            header("Refresh: 0; URL=efetivo.php");
    }else{
        echo "<h1>Erro ao excluir!</h1>";
    }
    

?>