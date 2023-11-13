<?php
    session_start();
    include("conexao.php");

    if ($_GET['cod']) {
        try {
            // QUERY para recuperar as informacoes do usuario
            $sql = "SELECT ds_imagem FROM tb_comunicado WHERE cd_comunicado = :id LIMIT 1";
            $consulta = $conn->prepare($sql);
            $consulta->bindParam(':id', $_GET['cod']);
            $consulta->execute();

            // Encontrou o comunicado
            if (($consulta) and ($consulta->rowCount() != 0)) {
                $apagar_comunicado_turma = $conn->prepare("DELETE FROM tb_comunicado_turma WHERE id_comunicado = :cd");
                $apagar_comunicado_turma->execute(array(
                    ':cd' => $_GET['cod']
                ));

                $apagar_comunicado = "DELETE FROM tb_comunicado WHERE cd_comunicado = :id LIMIT 1";
                $resultado_deleteComunicado = $conn->prepare($apagar_comunicado);
                $resultado_deleteComunicado->bindParam(':id', $_GET['cod']);

                // Comunicado excluido
                if ($resultado_deleteComunicado->execute()) {
                    // Ler as informcoes do usuario
                    $comunicado = $consulta->fetch(PDO::FETCH_ASSOC);
                    extract($comunicado);

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
            header("Location: ../adm-comunicados.php");
        } catch (Exception $erro) {
           echo "<p>Erro!</p>";
           header('Location: ../adm-comunicados.php');
        }
    }
?>