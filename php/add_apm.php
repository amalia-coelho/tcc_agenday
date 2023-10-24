<?php
if (empty($_POST['nm_produto']) || empty($_POST['ds_descricao']) || empty($_POST['nr_valor'])) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Por favor, preencha todos os campos.</span>
        </div>';
} elseif (strlen($_POST['nm_produto']) < 1) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Nome deve ter pelo menos 3 caracteres.</span>
        </div>';
} elseif (strlen($_POST['nr_valor']) < 1) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Selecione um valor.</span>
        </div>';
} elseif (strlen($_POST['ds_descricao']) < 1) {
    echo '<div class="alert">
            <i class="bi bi-exclamation-circle"></i>
            <span class="msg" style="font-size: 17px">Escreva uma descrição.</span>
        </div>';
}
 else {
	 try {
		session_start();
		$cadastrar_apm = "";
		include('conexao.php');
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
	  echo "<meta http-equiv='refresh' content='1'>";
	  echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0; animation: none;">
		 <i class="bi bi-check-lg "style="color: #9EB0A0";
		 "></i>
		  <span class="msg" style="color: #9EB0A0; font-size: 18px;
		  " >Produto Cadastrado!</span>
	  </div>';
	} catch(PDOException $e) {
 		echo 'Error: ' . $e->getMessage();
	}
}
?>