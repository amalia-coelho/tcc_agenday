<?php
	try {
		include('conexao.php');
		
		$email = $_POST['email'];

		$stmt = $conn->prepare("SELECT nr_verificacao FROM tb_usuario WHERE ds_email = :email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $result['nr_verificacao'];
	} catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        echo "<br>".$stmt->rowCount();
    }
?>