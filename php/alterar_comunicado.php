<?php
    include("conexao.php");
    try{
        //Apagar relacionados ao registro
        $stmt = $conn->prepare("DELETE FROM tb_comunicado_turma WHERE id_comunicado = :cd");
        $stmt->execute(array(
            ':cd' => $_POST['codigo']
        ));

        //Alterar imagem
        if ($_FILES['alterarImagem']['name'] != null) {
            unlink($_POST['imagemAntiga']); //Apagar imagem antiga
            
            $caminhoDestino =  __DIR__ . '/../uploads/' . $_SESSION['cd'] . '/' . $_FILES['alterarImagem']['name']; //Calcular destino imagem
            move_uploaded_file($_FILES['alterarImagem']['tmp_name'], $caminhoDestino); //Mover arquivo
            
            $arquivo = $caminhoDestino; //Path para salvar no banco
        }else{
            $arquivo = $_POST['imagemAntiga'];
        }

        $stmt_update = $conn->prepare("UPDATE tb_comunicado SET nm_titulo = :titulo, ds_descricao = :descricao, dt_comunicado = :dt_comunicado, ds_imagem = :ds_imagem, dt_postagem = NOW() WHERE cd_comunicado = :codigo");
        $stmt_update->execute(array(
            ":codigo" => $_POST['codigo'],
            ":titulo" => $_POST['titulo'],
            ":descricao" => $_POST['descricao'],
            ":ds_imagem" => $arquivo,
            ":dt_comunicado" => $_POST['data_comunicado']
        ));
        
        //add turmas na tabela solução
        foreach ($_POST['turmasAlterar'] as $turma) {
            $stmt = $conn->prepare("INSERT INTO tb_comunicado_turma (id_comunicado, id_turma) VALUES (:comunicado, :turma)");
            $stmt->execute(array(
                ':comunicado' => $_POST['codigo'],
                ':turma' => $turma
            ));
        }

        // echo "<meta http-equiv='refresh' content='1'>";
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>