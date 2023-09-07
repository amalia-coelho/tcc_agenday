<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_email = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // SE O EMAIL JA FOR CADASTRADO
        if ($usuario){
            if ($usuario['ds_senha'] == $_POST['senha']){
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['nome'] = $usuario['nm_usuario'];
                $_SESSION['cd'] = $usuario['cd_usuario'];
                $_SESSION['id_nivel'] = $usuario['id_nivel'];
                $_SESSION['id_turma'] = $usuario['id_turma'];
                echo "<meta http-equiv='refresh' content='1'>";
            }else{
                echo "Senha incorreta!";
            }
        }else{
            echo "Usuário não encontrado!";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
