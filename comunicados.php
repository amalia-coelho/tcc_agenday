<?php
	session_start();
	include('php/conexao.php');
	if (!isset($_SESSION['email'])) {
		header('Location: index.php');
	} else {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Comunicados</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/comunicado.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/selectcheck.css">
	    <link rel="stylesheet" href="css/selectcheck.css">



	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- /css -->

	<!-- js -->
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
	<script src="js/jquery.maskMoney.min.js"></script>

	<script>
		$(document).ready(function(){

			//ADD COMUNICADO
			$('#addComunicado').submit(function (e) {
				e.preventDefault();

				var formulario = new FormData(this); // Crie um objeto FormData com os dados do formulário
				$.ajax({
					type: 'POST',
					url: 'php/add_comunicado.php',
					data: formulario,
					contentType: false,
					processData: false,
				}).done(function(resposta){
					//Recarregar página
					$("#exibe").html(resposta);
				}).fail(function(jqXHR, textStatus ) {
					console.log("Request failed: " + textStatus);
				});
			});

			//UPDATE COMUNICADO

			//Pegar os valores dos inputs
			$(".alterar").on("click", function(){
				$("#exibir_cod").text($(this).attr('cod'));
				$("#exibir_path").text($(this).attr('imagem'));
				$("#alterarTitulo").val($(this).attr('titulo'));
				$("#alterarData").val($(this).attr('dt_comunicado'));
				$("#alterarDescricao").val($(this).attr('descricao'));
			
				//SELECT TURMAS
				var turmasString = $(this).attr('turmas');
				var turmasArray = turmasString.split('-');

				for (var i = 0; i < turmasArray.length; i++) {
					$("input[name='turmasAlterar[]'][value='" + turmasArray[i] + "']").prop('checked', true);
				}
			});

			//Atualizar valores
			$('#alterarComunicado').submit(function (e) {
				e.preventDefault();

				var formulario = new FormData(this);
				formulario.append('codigo', $("#exibir_cod").text());
				formulario.append('imagemAntiga', $("#exibir_path").text());
				
				$.ajax({
					type: 'POST',
					url: 'php/alterar_comunicado.php',
					data: formulario,
					contentType: false,
					processData: false,
				}).done(function(resposta){
					$("#exibe2").html(resposta);
				}).fail(function(jqXHR, textStatus ) {
					console.log("Request failed: " + textStatus);
				});
			});
		});
		</script>
	<!-- /js -->
	</head>
<body>
	<section class="-container">
    <!-- INICIO MENU  -->
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
					<span class="txt-link">Calendário</span>
				</a>
			</li>
			  <li class="item-menu ativo">
					  <a href="comunicados.php">
					  <span class="icon"><i class="bi bi-megaphone-fill"></i></span>
					  <span class="txt-link">Comunicados</span>
					  </a>
				  </li>
				  <li class="item-menu">
					  <a href="apm.php">
					  <span class="icon"><i class="bi bi-cart4"></i></span>
					  <span class="txt-link">APM</span>
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
				  <?php
			// Verifica se o 'id_nivel' do usuário é igual a 1
			if ($_SESSION['id_nivel'] == 1) {
				?>
				<li class="item-menu">
					<a href="adm-gerenciamento.php">
					<span class="icon"><i class="bi bi-gear-fill"></i></span>
					<span class="txt-link">Gerenciamento</span>
					</a>
				</li>
<?php
}?>
				  <li class="item-menu">
					  <a href="php/logout.php">
					  <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
					  <span class="txt-link">Sair</span>
					  </a>
				  </li>
				  </ul>
		  </nav>
    <!-- FIM DO MENU -->
  </section>
	</section>
	<main class="body">
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
<section >		
	
<div class="comuni">
	<h1>Comunicados</h1>
</div>
       

<!-- fim da search bar-->
		<?php
			$sql = "SELECT * FROM tb_comunicado";

			foreach ($conn->query($sql) as $item){
				//pegar a array de turmas selecionadas no comunicado
				$stmt = $conn->prepare("SELECT id_turma FROM tb_comunicado_turma WHERE id_comunicado = :id");
				$stmt->execute(array(
					':id' => $item['cd_comunicado']
				));
				$turmasAlterar = $stmt->fetchAll(PDO::FETCH_COLUMN);
				$turmasString = implode('-', $turmasAlterar);
				?>
				<section class="comunicado horizontal borda-gradient">
					<div class="comunicado-image">
						<img src="<?php echo $item['ds_imagem'];?>" alt="Imagem do comunicado">
					</div>
					<div class="comunicado-content">
						<div class="comunicado-header">
							<h2><?php echo $item['nm_titulo'];?></h2>
							<?php
								list($ano, $mes, $dia) = explode('-', $item['dt_postagem']);
								$postagem = $dia."-".$mes."-".$ano;
							?>
							<p class="date"><?php echo $postagem;?></p>
						</div>
						<p class="comunicado-text"><?php echo $item['ds_descricao'];?></p>
					</div>
			</section>
				<?php
			}
			?>	
			</section>
	</main>
	
	<script src="js/duvidas.js"></script>
	<script src="js/menu.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
	  <script src="js/select-comunicado.js"></script></body>
	  <script src="js/selectcheck.js"></script></body>
	
</body>

</html>
<?php
    }
?>