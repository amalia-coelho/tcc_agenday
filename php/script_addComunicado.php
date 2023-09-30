<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("INSERT INTO tb_comunicado (nm_titulo, ds_descricao, dt_postagem, dt_comunicado, id_usuario) VALUES (:titulo, :descricao, NOW(), :dt_comunicado, :usuario)");
        $stmt->execute(array(
            ':titulo' => $_POST['titulo'],
            ':descricao' => $_POST['descricao'],
            ':dt_comunicado' => $_POST['data_comunicado'],
            ':usuario' => $_SESSION['cd']
        ));

        echo "<meta http-equiv='refresh' content='1'>";
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
