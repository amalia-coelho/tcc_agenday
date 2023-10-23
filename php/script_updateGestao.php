<?php
    include("conexao.php");
    try{
        $stmt_update = $conn->prepare("UPDATE tb_gestao SET nm_membro = :nome, ds_cargo = :cargo WHERE cd_membro = :codigo");
        $stmt_update->execute(array(
            ":codigo" => $_POST['codigo'],
            ":nome" => $_POST['nome'],
            ":cargo" => $_POST['cargo']
        ));
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>