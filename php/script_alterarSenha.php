<?php
    try{
        session_start();
        include('conexao.php');
        
        $consulta = $conn->prepare("SELECT ds_senha FROM tb_usuario WHERE cd_usuario = ".$_SESSION['cd']); // Preparar a consulta
        $consulta->execute();// Executar a consulta
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);// Recuperar linha de retorno

        if($usuario['ds_senha'] == $_POST['senhaAtual']){
            if($_POST['senhaNova'] == $_POST['confirmacao']){
                $stmt = $conn->prepare("INSERT INTO tb_usuario (ds_senha) VALUES (:senha)");
                $stmt->bindParam(':senha', $_POST['senhaNova'], PDO::PARAM_INT);
                $stmt->execute();

                echo "";
            }else{
                echo "A confirmação da senha não bateee!!";
            }
        }else{
            echo "Confirmação da senha atual incorreta!";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
