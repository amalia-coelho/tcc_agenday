<?php 
    try {
        $conn = new PDO('mysql:host=localhost;dbname=db_agenday', 'root', 'usbw');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
    $conn->exec("SET NAMES utf8");
    $conn->exec("SET CHARACTER SET utf8");
?>