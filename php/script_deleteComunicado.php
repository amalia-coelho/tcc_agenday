<?php
    try{
        session_start();
        include('conexao.php');

        $stmt = $conn->prepare("DELETE FROM tb_comunicado_turma WHERE id_comunicado = :cd");
        $stmt->execute(array(
            ':cd' => $_GET['cod']
        ));
        
        $stmt = $conn->prepare("DELETE FROM tb_comunicado WHERE cd_comunicado = :cd");
        $stmt->execute(array(
            ':cd' => $_GET['cod']
        ));
        
        header('Location: ../comunicados.php');
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>
