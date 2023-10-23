<?php
    include("conexao.php");
    try{
        echo $_POST['codigo'];
        echo $_POST['nome'];
        echo $_POST['cargo'];
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>