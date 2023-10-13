<?php
    session_start();
	include('php/conexao.php');

    if (!isset($_SESSION['email'])){
        header('Location: index.php');
    }else{
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


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
		integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- /css -->

	<!-- js -->
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
	<script src="js/jquery.maskMoney.min.js"></script>

	<script>
		$(document).ready(function(){
			$('.date').mask('00/00/0000');
			$('.time').mask('00:00h');
			
			$('#all-select').click(function() {
				var checked = this.checked;
				$('input[type="checkbox"]').each(function() {
					this.checked = checked;
				});
			});
			
			$("#salvar").click(function(){
				// pega os valores de inputs normais
				var descricao = $('#ds_descricao').val();
				var data_comunicado = $('#dt_comunicado').val();
				var titulo = $('#nm_titulo').val();
				
				//mapeia o array das turmas e salva os id's das selecionadas
				var turmasSelecionadas = $("input[name='turmas[]']:checked").map(function() {
					return $(this).val();
				}).get();
				
				// Crie um objeto com informações do arquivo
				var imagem = $('#ds_imagem')[0];
				// Crie um objeto com informações do arquivo
				var imagemInfo = {
        			nomeArquivo: fileName,
					tipoArquivo: imagem[0].files[0].type,
					tamanhoArquivo: imagem[0].files[0].size
    			};

				$.ajax({
					url: "php/script_addComunicado.php",
					type: "POST",
					data: "descricao="+descricao+"&data_comunicado="+data_comunicado+"&titulo="+titulo+"&turmas="+turmasSelecionadas+"&ds_imagem="+imagemInfo,
					dataType: "html"
				
					}).done(function(resposta){
						//fechar o modal
						$('#fechar').click();
						
						//Notificar registro
						alert("Comunicado adicionado com sucesso!");
						
						//Recarregar página
						$("#exibe").html(resposta);
						
						// Limpar os inputs
						$('#ds_descricao').val(' ');
						$('#dt_comunicado').val(' ');
						$('#nm_titulo').val(' ');
					}).fail(function(jqXHR, textStatus ) {
						console.log("Request failed: " + textStatus);
					});
			});

			//UPDATE COMUNICADO

			//Pegar os valores dos inputs
			$(".alterar").on("click", function(){
				$("#exibir_cod").text($(this).attr('cod'));
				$("#alterarTitulo").val($(this).attr('titulo'));
				$("#alterarData").val($(this).attr('dt_comunicado'));
				$("#alterarDescricao").val($(this).attr('descricao'));
			
				//SELECT TURMAS
				var turmasString = $(this).attr('turmas'); // Aqui, você obtém a string de atributo
				var turmasArray = turmasString.split('-');

				for (var i = 0; i < turmasArray.length; i++) {
					$("input[name='turmasAlterar[]'][value='" + turmasArray[i] + "']").prop('checked', true);
				}
			});

			// Quando apertar para "salvar alterações"
			$("#salvarAlterar").click(function(){
				// declaração de variáveis
				var cod = $("#exibir_cod").text();
				var titulo = $('#alterarTitulo').val();
				var data_comunicado = $('#alterarData').val();
				var descricao = $('#alterarDescricao').val();
				
				var turmasSelecionadas = $("input[name='turmasAlterar[]']:checked").map(function() {
					return $(this).val();
				}).get();
				
				$.ajax({
				url: "php/script_updateComunicado.php",
				type: "POST",
				data: "codigo="+cod+"&descricao="+descricao+"&data_comunicado="+data_comunicado+"&titulo="+titulo+"&turmas="+turmasSelecionadas,
				dataType: "html"
			
				}).done(function(resposta){
				//fechar o modal
				$('#fecharAlterar').click();
				
				//Notificar registro
				alert("Comunicado alterado com sucesso!");
				
				//Recarregar página
				$("#exibe").html(resposta);
				
				// Limpar os inputs
				$("#exibir_cod").text(" ");
				$("#alterarTitulo").val(" ");
				$("#alterarData").val(" ");
				$("#alterarDescricao").val(" ");
				$("input[name='turmasAlterar[]").prop('checked', false);
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
    <!-- FIM DO MENU -->
  </section>
	<main>
    	<div class="comuni">
			<h1>Comunicados</h1>
    	</div>
		<div id="exibe">
			
		</div>
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
				<section class="comunicado horizontal">
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
						<button class="alterar" data-bs-toggle="modal" data-bs-target="#editModal" style="border:none;" cod="<?php echo $item['cd_comunicado'];?>" titulo="<?php echo $item['nm_titulo'];?>" descricao="<?php echo $item['ds_descricao']?>" dt_comunicado="<?php echo $item['dt_comunicado']?>" turmas="<?php echo $turmasString;?>">
							<i class="bi bi-pencil-square edit-icon"></i>
						</button>
						<a href="php/script_deleteComunicado.php?cod=<?php echo $item['cd_comunicado'];?>"><i class="bi bi-trash-fill delete-icon"></i></a>  
					</div>
				</section>
				<?php
			}
			?>	
		<div class="comunicado-img">
			<img src="img/ecotourism-animate.svg" alt="Figura Inicial" class="comunicado-element">
		</div>

    	<!-- Modal de Alteração -->
    	<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      		<div class="modal-dialog modal-dialog-centered">
        		<div class="modal-content">
          			<div class="modal-header">
						<h1 class="modal-title fs-5" id="editModalLabel">Editar Comunicado</h1>
						<button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
          			</div>
          			<div class="modal-body">
              			<div class="mb-3">
                			<label for="imageInput" class="form-label">Alterar Imagem do Comunicado</label>
							<div class="input-group">
								<input type="file" class="form-control" id="imageInput" accept="image/*">
								<button class="btn btn-outline-secondary" type="button" id="editButton">
									<i class="bi bi-pencil"></i> <!-- Ícone de editar -->
								</button>
                			</div>
              			</div>
              			<div class="mb-3">
							<label for="alterarTitulo" class="form-label">Alterar Título do Comunicado</label>
							<input type="text" class="form-control" id="alterarTitulo">
						</div>
              			<div class="row mb-3 altura-curso">
							<div class="col">
								<label for="alterarData" class="form-label">Data</label>
								<input type="date" class="form-control" id="alterarData">
							</div>
                			<div class="col">
								<div class="select-btn">
									<span class="btn-text">Selecionar Curso</span>
									<i class="bi bi-chevron-down"></i>
								</div>
								<ul class="list-itens">
									<li class="a" id="all-select" style="cursor:pointer;">
										<label class="form-check-label" for="selectAllOptions" style="cursor:pointer;">Todos</label>
									</li>
									<?php
										//exibir o select
										$sql = "SELECT * FROM tb_turma";

										foreach ($conn->query($sql) as $item){?>
											<li class="item">
												<!-- Checkbox oculto -->
												<input type="checkbox" class="checkbox" name="turmasAlterar[]" value="<?php echo $item['cd_turma'];?>" id="<?php echo $item['nm_turma'];?>">
												<label class="checkbox-label" for="<?php echo $item['nm_turma'];?>"></label>
												</span>
												<span class="item-text"><?php echo $item['nm_turma'];?></span>
											</li>
										<?php
										}
									?>
                    			</ul>
                			</div>
              			</div>
						  <br>
						  <div class="mb-3">
							  <label for="alterarDescricao" class="form-label">Alterar Descrição</label>
							  <textarea class="form-control" id="alterarDescricao" rows="4"></textarea>
							</div>
						</div>
						<p id="exibir_cod" style="visibility: hidden;"></p>
						<div class="modal-footer">
							<button type="button" class="btn btn-roxo" id="salvarAlterar">Salvar Alterações</button>
							<button type="button" class="btn btn-azul" data-bs-dismiss="modal" id="fecharAlterar">Cancelar</button>
						</div>
				</div>
      		</div>
    	</div>
    	<!-- Fim do modal de Alteração -->


		<!-- inIcio do modal ADD -->
		<button type="button" class="btn btn-primary add" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
			<i class="bi bi-plus-circle-fill"></i> <!-- Ícone de adição -->
		</button>

		<!-- Modal ADD -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Comunicado</h1>
						<button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-3">
							<label for="imageInput" class="form-label">Imagem do Comunicado</label>
							<div class="input-group">
								<input type="file" class="form-control" id="ds_imagem" accept=".jpg, .jpeg">
								<button class="btn btn-outline-secondary" type="button" id="editButton">
									<i class="bi bi-pencil"></i> <!-- Ícone de editar -->
								</button>
							</div>
						</div>
						<div class="mb-3">
							<label for="nm_titulo" class="form-label">Título do Comunicado</label>
							<input type="text" class="form-control" id="nm_titulo">
						</div>
						<div class="row mb-3">
							<div class="col">
								<label for="dt_comunicado" class="form-label">Data</label>
								<input type="date" class="form-control" id="dt_comunicado">
							</div>
							<div class="col">
								<div class="select-btn">
									<span class="btn-text">Selecionar Curso</span>
									<i class="bi bi-chevron-down"></i>
								</div>
								<ul class="list-itens">
									<li class="a" id="all-select" style="cursor:pointer;">
										<label class="form-check-label" for="selectAllOptions"
											style="cursor:pointer;">Todos</label>
									</li>
									<?php
										$sql = "SELECT * FROM tb_turma";

										foreach ($conn->query($sql) as $item){?>
											<li class="item">
												<!-- Checkbox oculto -->
												<input type="checkbox" class="checkbox" name="turmas[]" value="<?php echo $item['cd_turma'];?>" id="<?php echo $item['nm_turma'];?>">
												<label class="checkbox-label" for="<?php echo $item['nm_turma'];?>"></label>
												</span>
												<span class="item-text"><?php echo $item['nm_turma'];?></span>
											</li>
										<?php
										}
									?>
                    			</ul>
                			</div>
						</div>
						<div class="mb-3">
							<label for="ds_descricao" class="form-label">Descrição</label>
							<textarea class="form-control" id="ds_descricao" rows="4"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-roxo" id="salvar">Salvar</button>
						<button type="button" class="btn btn-azul" id="fechar" data-bs-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- fim do modal ADD-->
	</main>
	
	<script src="js/duvidas.js"></script>
	<script src="js/menu.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
	<script src="js/selectcheck.js"></script>
</body>

</html>
<?php
    }
?>