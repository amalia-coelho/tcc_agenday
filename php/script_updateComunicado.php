<?php
    require("conexao.php");
    try{
        $stmt_update = $conn->prepare("UPDATE tb_comunicado SET nm_titulo = :titulo, ds_descricao = :descricao, dt_comunicado = :dt_comunicado WHERE cd_comunicado = :codigo");
        $stmt_update->execute(array(
            ":codigo" => $_POST['codigo'],
            ":titulo" => $_POST['titulo'],
            ":descricao" => $_POST['descricao'],
            ":dt_comunicado" => $_POST['dt_comunicado']
        ));

        echo "<meta http-equiv='refresh' content='1'>";
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>