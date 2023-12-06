<?php
    try{
        session_start();
        include("conexao.php");

        if(isset($_POST['codigo'])){
            $stmt = $conn->prepare("SELECT nr_verificacao FROM tb_usuario WHERE nr_verificacao = :codigo");
            $stmt->bindParam(':codigo', $_POST['codigo']);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                $_SESSION['permissaoAlterar'] = "True";
                $_SESSION['codigo'] = $_POST['codigo'];
            }
        }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>