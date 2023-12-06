<?php
    try {
        session_start();
        include('conexao.php');

        function obterCaminhoSubpasta() {
            $dirAtual = __DIR__;
            $subpasta = $dirAtual . '/../uploads/gestao';
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
                $stmt = $conn->prepare('INSERT INTO tb_gestao (nm_membro, ds_cargo, ds_imagem, dt_modificacao, id_nivel) VALUES(:nome, :cargo, :imagem, NOW(), :nivel)');
                $stmt->execute(array(
                    ':nome' => $_POST['nm_membro'],
                    ':cargo' => $_POST['ds_cargo'],
                    ':imagem' => "uploads/gestao/".$arquivo['name'],
                    ':nivel' => 1
                ));
                
                echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0; animation: none;"><i class="bi bi-check-lg "style="color: #9EB0A0";"></i><span class="msg" style="color: #9EB0A0; font-size:18px;">Membro adicionado!</span></div>';
                echo "<meta http-equiv='refresh' content='1'>";
            } else {
                echo '<div class="alert"><i class="bi bi-exclamation-circle"></i><span class="msg" style="font-size: 17px">Erro no envio da imagem!.</span></div>';        
            }
        } else {
            echo '<div class="alert"><i class="bi bi-exclamation-circle"></i><span class="msg" style="font-size: 17px">Erro! Tente novamente!</span></div>';
        }   
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>" . $stmt->rowCount();
    }
?>
