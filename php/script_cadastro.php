<?php
if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['rm']) || empty($_POST['turma'])) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Por favor, preencha todos os campos.</span>
        </div>';
} elseif (strlen($_POST['nome']) < 3) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Nome deve ter pelo menos 3 caracteres.</span>
        </div>';
} elseif (strlen($_POST['rm']) < 5) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">RM deve conter pelo menos 5 caracteres.</span>
        </div>';
} elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST['email'])) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Insira um endereço de email válido.</span>
        </div>';
} 
elseif (strlen($_POST['senha']) < 8){
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Senha de no mínimo 8 caracteres.</span>
        </div>';
} 
elseif ($_POST['senha'] !== $_POST['confirmacao']) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Senhas incompatíveis.</span>
        </div>';
} else {
    try{
        session_start();
        include('conexao.php');
    // Verifique se o campo "turma" é diferente de 0 (ou outro valor padrão que você usa para não selecionado)
    if ($_POST['turma'] == 0) {
        echo '<div class="alert">
                <i class="bi bi-exclamation-circle"></i>
                <span class="msg" style="font-size: 17px">Por favor, selecione uma turma.</span>
            </div>';
    } else {
        $stmt = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_email = :email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();

        $consulta = $stmt->fetch(PDO::FETCH_ASSOC);

        // SE O EMAIL JA FOR CADASTRADO
        if ($consulta) {
            echo '<div class="alert">
                    <i class="bi bi-exclamation-circle"></i>
                    <span class="msg">Email Já está Cadastrado!</span>
                </div>';
        } else {
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
            echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0; animation: none;">
            <i class="bi bi-check-lg "style="color: #9EB0A0";
            "></i>
             <span class="msg" style="color: #9EB0A0;
             " >Credencias Corretas!</span>
         </div>
         <script>
         $(".spinner-border").show();
         </script>
         ';
        }
    }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
}
?>
