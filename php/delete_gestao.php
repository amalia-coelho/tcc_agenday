<?php
    session_start();
    include("conexao.php");

    if ($_GET['cod']) {
        try {
            // QUERY para recuperar as informacoes do usuario
            $sql = "SELECT ds_imagem FROM tb_gestao WHERE cd_membro = :id LIMIT 1";
            $consulta = $conn->prepare($sql);
            $consulta->bindParam(':id', $_GET['cod']);
            $consulta->execute();

            // Encontrou o comunicado
            if (($consulta) and ($consulta->rowCount() != 0)) {
                $apagar_membro = "DELETE FROM tb_gestao WHERE cd_membro = :id LIMIT 1";
                $resultado_deleteMembro = $conn->prepare($apagar_membro);
                $resultado_deleteMembro->bindParam(':id', $_GET['cod']);

                // Comunicado excluido
                if ($resultado_deleteMembro->execute()) {
                    // Ler as informcoes do usuario
                    $gestao = $consulta->fetch(PDO::FETCH_ASSOC);
                    extract($gestao);

                    // Verificar se existe o nome da imagem salva no banco de dados
                    if(!empty($ds_imagem)){
                        $imagem = "../".$ds_imagem;
                        // Apagar a imagem
                        if(file_exists($imagem)){
                            unlink($imagem);
                        }
                    }
                }
            }
            header("Location: ../gestao.php");
        } catch (Exception $erro) {
           echo "<p>Erro!</p>";
           header('Location: ../gestao.php');
        }
    }
?>