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
    session_start();
    include("conexao.php");
    
    function obterCaminhoSubpasta() {
        $dirAtual = __DIR__;
        $subpasta = $dirAtual . '/../uploads/' . $_SESSION['cd'];
        return $subpasta;
    }
    
    try{
        //Apagar relacionados ao registro
        $delete_comunicado_turma = $conn->prepare("DELETE FROM tb_comunicado_turma WHERE id_comunicado = :cd");
        $delete_comunicado_turma->execute(array(
            ':cd' => $_POST['codigo']
        ));

        // Upload imagem + caminho ds_imagem
        if ($_FILES['alterarImagem']['name'] != null) {
            $imagem = "../".$_POST['imagemAntiga'];
            // Apagar a imagem
            if(file_exists($imagem)){
                unlink($imagem);
            }
            
            // Caminho para upload da nova
            $subpasta = obterCaminhoSubpasta();
            $caminhoDestino = $subpasta.'/'.$_FILES['alterarImagem']['name'];
            move_uploaded_file($_FILES['alterarImagem']['tmp_name'], $caminhoDestino); //Mover arquivo
            $arquivo = 'uploads/'. $_SESSION['cd'] . '/' . $_FILES['alterarImagem']['name']; //Calcular destino imagem
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

        echo "<meta http-equiv='refresh' content='1'>";
         echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0; animation: none;">
            <i class="bi bi-check-lg "style="color: #9EB0A0";
            "></i>
             <span class="msg" style="color: #9EB0A0; font-size: 18px;
             " >Alteração Feita!</span>
         </div>';
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
}
?>