<?php
	session_start();
	require('conexao.php');
	try {
	  $stmt = $conn->prepare('DELETE FROM events WHERE id = :id');
	  $stmt->execute(array(
	  	':id' => $_GET['id']
	  ));
	  header('location:../calendario.php');
	  
	} catch(PDOException $e) {
 		echo 'Error: '.$e->getMessage();
	}
?>