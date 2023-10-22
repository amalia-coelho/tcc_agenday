<?php
try {
    session_start();
    include('conexao.php');
    
    function obterCaminhoSubpasta() {
        $dirAtual = __DIR__;
        $subpasta = $dirAtual . '/../uploads/' . $_SESSION['cd'];
        return $subpasta;
    }

    // Verificar se um arquivo foi enviado
    if (isset($_FILES['ds_imagem'])) {
        $arquivo = $_FILES['ds_imagem'];
        $subpasta = obterCaminhoSubpasta();

        // Verifica se a pasta já existe, se não, a cria
        if (!is_dir($subpasta)) {
            mkdir($subpasta, 0777, true);
        }

        $caminhoDestino = $subpasta . '/' . $arquivo['name'];

        if (move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) {
            // Inserção na tabela tb_comunicado
            $stmt = $conn->prepare("INSERT INTO tb_comunicado (nm_titulo, ds_descricao, dt_postagem, dt_comunicado, id_usuario, ds_imagem) VALUES (:titulo, :descricao, NOW(), :data_comunicado, :usuario, :imagem)");
            $stmt->execute(array(
                ':titulo' => $_POST['titulo'],
                ':descricao' => $_POST['descricao'],
                ':data_comunicado' => $_POST['data_comunicado'],
                ':usuario' => $_SESSION['cd'],
                ':imagem' => "uploads/".$_SESSION['cd']."/".$arquivo['name']
            ));
            
            // Recupera o ID do comunicado recém-inserido
            $stmt = $conn->prepare("SELECT cd_comunicado FROM tb_comunicado WHERE id_usuario = :id AND dt_comunicado = :data_comunicado AND nm_titulo = :titulo AND ds_descricao = :descricao");
            $stmt->execute(array(
                ':titulo' => $_POST['titulo'],
                ':descricao' => $_POST['descricao'],
                ':data_comunicado' => $_POST['data_comunicado'],
                ':id' => $_SESSION['cd']
            ));
            $cd_comunicado = $stmt->fetchColumn();
            
            // Processa turmas selecionadas
            // $turmasSelecionadas = explode(",", $_POST['turmas']);
            foreach ($_POST['turmas'] as $turma) {
                $stmt = $conn->prepare("INSERT INTO tb_comunicado_turma (id_comunicado, id_turma) VALUES (:comunicado, :turma)");
                $stmt->execute(array(
                    ':comunicado' => $cd_comunicado,
                    ':turma' => $turma
                ));
            }
            
            echo "<meta http-equiv='refresh' content='1'>";
        } else {
            echo "Erro no envio da imagem!";
        }
    } else {
        echo "O arquivo não chegou no script!";
    }


} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    echo "<br>" . $stmt->rowCount();
}
?>