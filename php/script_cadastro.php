<?php
    try{
        session_start();
        include('conexao.php');
        
        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_email = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // SE O EMAIL JA FOR CADASTRADO
        if ($consulta){
            echo '<div class="alert">
                    <i class="bi bi-exclamation-circle"></i>
                    <span class="msg">Email Já está Cadastrado!</span>
                </div>';
        }else{
            $stmt = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, ds_email, ds_senha, nr_rm, id_turma, id_nivel) VALUES (:nome, :email, :senha, :rm, :turma, :nivel)");
            $stmt->execute(array(
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha'],
                ':rm' => $_POST['rm'],
                ':turma' => $_POST['turma'],
                ':nivel' => 2
            ));
            
            $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_email = :email");
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->execute();
            
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['cd'] = $usuario['cd_usuario'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['nome'] = $usuario['nm_usuario'];
            $_SESSION['id_nivel'] = $usuario['id_nivel'];
            echo "<meta http-equiv='refresh' content='1'>";
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>

