<?php
try {
    session_start();
    include('conexao.php');

    $pastaPai = "uploads/";
    $pastaUser = $pastaPai . $_SESSION['cd'];

    // Verifica se a pasta do usuário já existe e cria-a se não existir
    if (!is_dir($pastaUser)) {
        mkdir($pastaUser, 0777, true);
    }

    //faz upload do arquivo para a pasta
    $caminhoDestino = $pastaUser . '/' . $_POST['ds_imagem']['nomeArquivo'];
    move_uploaded_file($_POST['ds_imagem']['nomeArquivo'], $caminhoDestino);

    // Inserção na tabela tb_comunicado
    $stmt = $conn->prepare("INSERT INTO tb_comunicado (nm_titulo, ds_descricao, dt_postagem, dt_comunicado, id_usuario, ds_imagem) VALUES (:titulo, :descricao, NOW(), :data_comunicado, :usuario, :imagem)");
    $stmt->execute(array(
        ':titulo' => $_POST['titulo'],
        ':descricao' => $_POST['descricao'],
        ':data_comunicado' => $_POST['data_comunicado'],
        ':usuario' => $_SESSION['cd'],
        ':imagem' => $pastaUser."/".$_POST['ds_imagem']['nomeArquivo']
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
    $turmasSelecionadas = explode(",", $_POST['turmas']);
    foreach ($turmasSelecionadas as $turma) {
        $stmt = $conn->prepare("INSERT INTO tb_comunicado_turma (id_comunicado, id_turma) VALUES (:comunicado, :turma)");
        $stmt->execute(array(
            ':comunicado' => $cd_comunicado,
            ':turma' => $turma
        ));
    }

    // echo "<meta http-equiv='refresh' content='1'>";
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    echo "<br>" . $stmt->rowCount();
}
?>