<?php
	$cadastrar_gestao = "";
	include('conexao.php');
	try {
	  $stmt = $conn->prepare('INSERT INTO tb_gestao (nm_membro, ds_cargo) VALUES(:nome, :cargo)');
	  $stmt->execute(array(
	    ':nome' => $_POST['nm_membro'],
	    ':cargo' => $_POST['ds_cargo'],
	  ));

	  //SELECT
	  $sql = 'SELECT * FROM tb_gestao';
	  foreach ($conn->query($sql) as $row) {
	  	$cadastrar_gestao .=$row['nm_membro']."   ";
	  	$cadastrar_gestao .=$row['ds_cargo']."   ";
	  }
	  echo $cadastrar_gestao;

	} catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
	}
?>