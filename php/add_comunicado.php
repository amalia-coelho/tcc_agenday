<?php
if (empty($_POST['titulo']) || empty($_POST['data_comunicado']) || empty($_POST['descricao'])) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Por favor, preencha todos os campos.</span>
        </div>';
} elseif (strlen($_POST['titulo']) < 3) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Titulo deve ter pelo menos 3 caracteres.</span>
        </div>';
} elseif (strlen($_POST['data_comunicado']) < 3) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Selecione uma Data.</span>
        </div>';
} elseif (strlen($_POST['descricao']) < 3) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Escreva uma descrição.</span>
        </div>';
}
 else {
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
            
                    echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0; animation: none;">
            <i class="bi bi-check-lg "style="color: #9EB0A0";
            "></i>
             <span class="msg" style="color: #9EB0A0; font-size:18px;
             " >Comunicado adicionado!</span>
         </div>';
            echo "<meta http-equiv='refresh' content='1'>";
        } else {
            echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Erro no envio da imagem!.</span>
        </div>';        }
    } else {
        echo "O arquivo não chegou no script!";
    }


} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    echo "<br>" . $stmt->rowCount();
}
}
?>



