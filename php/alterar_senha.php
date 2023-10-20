<?php
    try{
        session_start();
        include('conexao.php');
        
        $consulta = $conn->prepare("SELECT ds_senha FROM tb_usuario WHERE cd_usuario = ".$_SESSION['cd']); //Preparar a consulta
        $consulta->execute(); // Executar a consulta
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC); // Recuperar linha de retorno

        if($usuario['ds_senha'] == $_POST['senhaAtual']){
            if($_POST['senhaNova'] == $_POST['confirmacao']){
                $stmt = $conn->prepare("UPDATE tb_usuario SET ds_senha = :senha WHERE cd_usuario = :id");
                $stmt->execute(array(
                    ":senha" => $_POST['senhaNova'],
                    ":id" => $_SESSION['cd']
                ));
                $stmt->execute();

                echo "<meta http-equiv='refresh' content='1'>";
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
