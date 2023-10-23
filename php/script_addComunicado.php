<?php
    try{
        session_start();
        include('conexao.php');
        
        //add prop da tb_comunicado
        $stmt = $conn->prepare("INSERT INTO tb_comunicado (nm_titulo, ds_descricao, dt_postagem, dt_comunicado, id_usuario) VALUES (:titulo, :descricao, NOW(), :dt_comunicado, :usuario)");
        $stmt->execute(array(
            ':titulo' => $_POST['titulo'],
            ':descricao' => $_POST['descricao'],
            ':dt_comunicado' => $_POST['data_comunicado'],
            ':usuario' => $_SESSION['cd']
        ));
        
        $stmt = $conn->prepare("SELECT cd_comunicado FROM tb_comunicado WHERE id_usuario = :id AND dt_comunicado = :dt_comunicado AND nm_titulo = :titulo AND ds_descricao = :descricao");
        $stmt->execute(array(
            ':titulo' => $_POST['titulo'],
            ':descricao' => $_POST['descricao'],
            ':dt_comunicado' => $_POST['data_comunicado'],
            ':id' => $_SESSION['cd']
        ));
        $stmt->execute();
        $cd_comunicado = $stmt->fetchColumn();

        $turmasSelecionadas = explode(",", $_POST['turmas']); //transforma a str que o ajax mandou em array

        //add turmas na tabela solução
        foreach ($turmasSelecionadas as $turma) {
            $stmt = $conn->prepare("INSERT INTO tb_comunicado_turma (id_comunicado, id_turma) VALUES (:comunicado, :turma)");
            $stmt->execute(array(
                ':comunicado' => $cd_comunicado,
                ':turma' => $turma
            ));
        }

        echo "<meta http-equiv='refresh' content='1'>";
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
