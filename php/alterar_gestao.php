<?php
    session_start();
    include("conexao.php");
    
    function obterCaminhoSubpasta() {
        $dirAtual = __DIR__;
        $subpasta = $dirAtual . '/../uploads/gestao';
        return $subpasta;
    }
    
    try{
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
            $arquivo = 'uploads/gestao/' . $_FILES['alterarImagem']['name']; //Calcular destino imagem
        }else{
            $arquivo = $_POST['imagemAntiga'];
        }

        $stmt_update = $conn->prepare("UPDATE tb_gestao SET nm_membro = :nome, ds_cargo = :cargo, ds_imagem = :imagem, dt_modificacao = NOW() WHERE cd_membro = :codigo");
        $stmt_update->execute(array(
            ":codigo" => $_POST['codigo'],
            ":nome" => $_POST['nome'],
            ":cargo" => $_POST['cargo'],
            ":ds_imagem" => $arquivo,
        ));

        echo "<meta http-equiv='refresh' content='1'>";
        echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0; animation: none;"><i class="bi bi-check-lg "style="color: #9EB0A0";"></i><span class="msg" style="color: #9EB0A0; font-size: 18px;">Alteração Feita!</span></div>';
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>