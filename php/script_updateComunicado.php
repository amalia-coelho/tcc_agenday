<?php
    include("conexao.php");
    try{
        $stmt = $conn->prepare("DELETE FROM tb_comunicado_turma WHERE id_comunicado = :cd");
        $stmt->execute(array(
            ':cd' => $_POST['codigo']
        ));
        
        $stmt_update = $conn->prepare("UPDATE tb_comunicado SET nm_titulo = :titulo, ds_descricao = :descricao, dt_comunicado = :dt_comunicado, dt_postagem = NOW() WHERE cd_comunicado = :codigo");
        $stmt_update->execute(array(
            ":codigo" => $_POST['codigo'],
            ":titulo" => $_POST['titulo'],
            ":descricao" => $_POST['descricao'],
            ":dt_comunicado" => $_POST['data_comunicado']
        ));
        
        $turmasSelecionadas = explode("-", $_POST['turmas']); //transforma a str que o ajax mandou em array

        //add turmas na tabela solução
        foreach ($turmasSelecionadas as $turma) {
            $stmt = $conn->prepare("INSERT INTO tb_comunicado_turma (id_comunicado, id_turma) VALUES (:comunicado, :turma)");
            $stmt->execute(array(
                ':comunicado' => $_POST['codigo'],
                ':turma' => $turma
            ));
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>