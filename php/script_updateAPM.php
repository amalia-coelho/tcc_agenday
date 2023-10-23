<?php
    include("conexao.php");
    try{
        $stmt_update = $conn->prepare("UPDATE tb_apm SET nm_produto = :nome, ds_descricao = :descricao, nr_valor = :nr_valor WHERE cd_apm = :codigo");
        $stmt_update->execute(array(
            ":codigo" => $_POST['codigo'],
            ":nome" => $_POST['nome'],
            ":descricao" => $_POST['descricao'],
            ":nr_valor" => $_POST['valor']
        ));
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>