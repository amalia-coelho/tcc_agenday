<?php
	session_start();
	require('conexao.php');
	try {
	  $stmt = $conn->prepare('DELETE FROM tb_usuario WHERE cd_usuario = :cd');
	  $stmt->execute(array(
	  	':cd' => $_GET['cd']
	  ));
	  header('location:../adm-gerenciamento.php');
	  
	} catch(PDOException $e) {
 		echo 'Error: '.$e->getMessage();
	}
?>