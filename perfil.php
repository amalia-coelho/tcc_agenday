<?php
    session_start();
    include("php/conexao.php");
    if (!isset($_SESSION['email'])){
        header('Location: index.php');
    }else{
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/perfil.css">
	<link rel="stylesheet" href="css/menu.css">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<!-- /css -->

	<!-- js -->
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="js\jquery-3.6.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#alterar").click(function(){
				//pegar os valores dos input's
				var senhaAtual = $("#senhaAtual").val();
				var senhaNova = $("#senhaNova").val();
				var confirmacao = $("#senhaConfirmacao").val();

				$.ajax({
                url: "php/alterar_senha.php",
                type: "POST",
                data: "senhaAtual="+senhaAtual+"&senhaNova="+senhaNova+"&confirmacao="+confirmacao,
                dataType: "html"

                }).done(function(resposta){
                    $("#exibe").html(resposta);
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
                });
			});
		});
	</script>
	<!-- /js -->
	<title>Perfil</title>
</head>

<body>
    <section class="-container">
    <nav class="menu-lateral">
      <div class="btn-expandir">
        <i class="bi bi-list" id="btn-exp"></i>
      </div>
      <ul>
      <li class="item-menu">
				<a href="perfil.php">
				<span class="icon"><i class="bi bi-person-fill"></i></span>
				<span class="txt-link">Usuário</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="calendario.php">
					<span class="icon"><i class="bi bi-house-door-fill"></i></span>
					<span class="txt-link">Home</span>
				</a>
			</li>
        <li class="item-menu">
				<a href="comunicados.php">
				<span class="icon"><i class="bi bi-megaphone-fill"></i></span>
				<span class="txt-link">Comunicados</span>
				</a>
			</li>
			<li class="item-menu ">
				<a href="apm.php">
				<span class="icon"><i class="bi bi-cart4"></i></span>
				<span class="txt-link">APM</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="painel.php">
				<span class="icon"><i class="bi bi-heart-fill"></i></span>
				<span class="txt-link">Saúde</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="gestao.php">
				<span class="icon"><i class="bi bi-person-workspace"></i></span>
				<span class="txt-link">Gestão</span>
				</a>
			</li>
        <li class="item-menu">
				<a href="duvidas.php">
				<span class="icon"><i class="bi bi-question-lg"></i></span>
				<span class="txt-link">Dúvidas</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="gerenciamento.php">
				<span class="icon"><i class="bi bi-gear-fill"></i></span>
				<span class="txt-link">Gerenciamento</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="php/logout.php">
				<span class="icon"><i class="bi bi-box-arrow-right"></i></span>
				<span class="txt-link">Sair</span>
				</a>
			</li>
			</ul>
    </nav>
    </section>
    <div class="perfil">
        <h1>Perfil</h1>
    </div>
    <div class="user-container">
        <?php
          // Puxar as informações do usuário

          $sql = "SELECT * FROM tb_usuario WHERE cd_usuario = :cd";

          $consulta = $conn->prepare($sql); // Preparar a consulta
          $consulta->bindParam(':cd', $_SESSION['cd'], PDO::PARAM_STR); //preencher o ":cd"
          $consulta->execute();// Executar a consulta
          $usuario = $consulta->fetch(PDO::FETCH_ASSOC);// Recuperar linha de retorno
        ?>
        <div class="user">
          <label for="campos">
              <p class="campos"><?php echo $usuario['nm_usuario'];?></p>
          </label>
          <label for="campos" class="senha-label">
              <p class="campos">Sua senha</p>
              <span class="icon edit-icon" data-bs-toggle="modal" data-bs-target="#editModal">
                  <i class="bi bi-pencil-square"></i>
              </span>
          </label>
          <label for="campos">
            <?php
              // Exibir o nome da turma ao invés de seu id
			  
              $sql_turma = "SELECT nm_turma FROM tb_turma WHERE cd_turma = ".$usuario['id_turma'];
			  
              $consultaTurma = $conn->prepare($sql_turma); // Preparar a consulta
              $consultaTurma->execute();// Executar a consulta
              $resultado = $consultaTurma->fetch(PDO::FETCH_ASSOC);// Recuperar linha de retorno
			  ?>
            <p class="campos">Turma: <?php echo $resultado['nm_turma'];?></p>
		</label>
		<label for="campos">
			<p class="campos">
				Saúde: <span id="health"><i class="bi bi-plus"></i></span>
            </p>
		</label>
		<label for="campos">
			<p class="campos">RM: <?php echo $usuario['nr_rm'];?></p>
		</label>
	</div>
</div>

<!-- Modal de Alteração -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="editModalLabel">Alterar Senha</h1>
					<button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!-- Inputs para a alteração -->
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="senhaAtual" placeholder="Sua Senha Atual">
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="senhaNova" placeholder="Sua Nova Senha">
					</div>
					<div class="input-group mb-3">
						<input type="password" id="senhaConfirmacao" class="form-control" placeholder="Confirme Sua Senha">
						<button type="button" id="togglePassword" class="btn">
							<i class="bi bi-eye" id="eyeIcon"></i>
						</button>
					</div>
          <div id="exibe">
            
          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-roxo" id="alterar">Alterar</button>
					<button type="button" class="btn btn-azul" data-bs-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fim do modal de Alteração -->
  <div class="espelho-img">
    <img src="img/espelho.svg" alt="Figura Inicial" class="espelho-element">
  </div>
  <script>
    const passwordInput = document.getElementById('senhaConfirmacao');
    const togglePasswordButton = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePasswordButton.addEventListener('click', () => {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
      }
    });
  </script>
  <script src="js/menu.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php
}
?>