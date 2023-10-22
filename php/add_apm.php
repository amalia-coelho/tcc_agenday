<?php
	$cadastrar_apm = "";
	include('conexao.php');
	try {
	  $stmt = $conn->prepare('INSERT INTO tb_apm (nm_produto, ds_descricao, nr_valor, ds_imagem) VALUES(:nome, :descricao, :valor, :imagem)');
	  $stmt->execute(array(
	    ':nome' => $_POST['nm_produto'],
	    ':descricao' => $_POST['ds_descricao'],
	    ':valor' => $_POST['nr_valor'],
	    ':imagem' => $_POST['ds_imagem'],
	  ));

	  //SELECT
	  $sql = 'SELECT * FROM tb_apm';
	  foreach ($conn->query($sql) as $row) {
	  	$cadastrar_apm .=$row['nm_produto']."   ";
	  	$cadastrar_apm .=$row['ds_descricao']."   ";
	  	$cadastrar_apm .=$row['nr_valor']."   ";
	  	$cadastrar_apm .=$row['ds_imagem']."<br>";
	  }
	  echo $cadastrar_apm;
	} catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
	}
?>