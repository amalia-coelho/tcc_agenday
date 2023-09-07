<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("INSERT INTO tb_comunicado (nm_titulo, ds_descricao, dt_postagem, dt_comunicado, id_turma, id_usuario) VALUES(:titulo, :descricao, NOW(), :dt_comunicado, :turmas, :usuario)");
        $stmt->execute(array(
            ':titulo' => $_POST['titulo'],
            ':descricao' => $_POST['descricao'],
            ':dt_comunicado' => $_POST['data'],
            ':turmas' => $_POST['turma'],
            ':usuario' => $_SESSION['cd']
        ));

            echo "Comunicado registrado com sucesso!";
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>