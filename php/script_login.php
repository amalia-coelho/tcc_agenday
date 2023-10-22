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
                echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0;">
                <i class="bi bi-check-lg "style="color: #9EB0A0";
                "></i>
                 <span class="msg" style="color: #9EB0A0;
                 " >Credencias Corretas!</span>
             </div>
             <script>
             $(".spinner-border").show();
             </script>
             ';
             
            }else{
                echo '<div class="alert">
                    <i class="bi bi-exclamation-circle"></i>
                    <span class="msg">Senha Incorreta!</span>
                </div>';
            }
        }else{
            echo '<div class="alert">
              <i class="bi bi-search"></i>
                    <span class="msg">Usuário Não Encontrado!</span>
                </div>';
            
 

        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
