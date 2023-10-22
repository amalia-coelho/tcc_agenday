<?php
	session_start();
	require('conexao.php');
	try {
	  $stmt = $conn->prepare('DELETE FROM tb_gestao WHERE cd_membro = :cd');
	  $stmt->execute(array(
	  	':cd' => $_GET['cd']
	  ));
	  header('location:../gestao.php');
	  
	} catch(PDOException $e) {
 		echo 'Error: '.$e->getMessage();
	}
?>