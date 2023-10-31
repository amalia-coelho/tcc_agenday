<?php
if (empty($_POST['senhaAtual']) || empty($_POST['senhaNova']) || empty($_POST['confirmacao'])) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Por favor, preencha todos os campos.</span>
        </div>';
}
elseif (strlen($_POST['senhaNova']) < 8){
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Senha de no mínimo 8 caracteres.</span>
        </div>';
} 
else {
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
                echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0;">
                <i class="bi bi-check-lg "style="color: #9EB0A0";
                "></i>
                 <span class="msg" style="color: #9EB0A0;
                 " >Senha Alterada!</span>
             </div>'; 
            }else{
                echo '<div class="alert">
                <i class="bi bi-exclamation-circle"></i>
                <span class="msg">As Senha Não Coincidem!</span>
            </div>';            }
        }else{
            echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg">Senha Atual Incorreta!</span>
        </div>';  
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
}
?>
