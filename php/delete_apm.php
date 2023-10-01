<?php
	session_start();
	require('conexao.php');
	try {
	  $stmt = $conn->prepare('DELETE FROM tb_apm WHERE cd_apm = :cd');
	  $stmt->execute(array(
	  	':cd' => $_GET['cd']
	  ));
	  header('location:../apm.php');
	  
	} catch(PDOException $e) {
 		echo 'Error: '.$e->getMessage();
	}
?>