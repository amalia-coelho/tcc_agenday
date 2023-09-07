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
            echo 'Email já cadastrado, tente fazer login!';
        }else{
            $stmt = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, ds_email, ds_senha, nr_rm, id_turma, id_nivel) VALUES(:nome, :email, :senha, :rm, :turma, :nivel)");
            $stmt->execute(array(
                ':nome' => "Raissa",
                ':email' => $_POST['email'],
                ':senha' => $_POST['senha'],
                ':rm' => 00001,
                ':turma' => 1,
                ':nivel' => 1
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

