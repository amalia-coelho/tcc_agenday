<?php
    session_start();
    include("conexao.php");

    if ($_GET['cod']) {
        try {
            // QUERY para recuperar as informacoes do usuario
            $sql = "SELECT ds_imagem FROM tb_apm WHERE cd_apm = :id LIMIT 1";
            $consulta = $conn->prepare($sql);
            $consulta->bindParam(':id', $_GET['cod']);
            $consulta->execute();

            // Encontrou o comunicado
            if (($consulta) and ($consulta->rowCount() != 0)) {
                $apagar_registro = "DELETE FROM tb_apm WHERE cd_apm = :id LIMIT 1";
                $resultado_deleteAPM = $conn->prepare($apagar_registro);
                $resultado_deleteAPM->bindParam(':id', $_GET['cod']);

                // Comunicado excluido
                if ($resultado_deleteAPM->execute()) {
                    // Ler as informcoes do usuario
                    $apm = $consulta->fetch(PDO::FETCH_ASSOC);
                    extract($apm);

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
            header("Location: ../ADM-APM.php");
        } catch (Exception $erro) {
           echo "<p>Erro!</p>";
           header('Location: ../ADM-APM.php');
        }
    }
?>