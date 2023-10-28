<?php
	include("php/conexao.php");
    session_start();
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
			<link rel="stylesheet" href="css/apm.css">
			<link rel="stylesheet" href="css/menu.css">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- /css -->

		<!-- js -->
			<script src="https://unpkg.com/scrollreveal"></script>
			<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
			<script src="https://unpkg.com/scrollreveal"></script>
			<script src="js/jquery.maskMoney.min.js"></script>
		<!-- /js -->

		<script type="text/javascript">
			$(document).ready(function(){
        		$(".preco").maskMoney({
        			prefix: "R$ ",
        			decimal: ",",
					thousands: "."
      			});

				//ADD APM
				$('#addProduto').submit(function (e) {
					e.preventDefault();

					var formulario = new FormData(this); // Crie um objeto FormData com os dados do formulário
					$.ajax({
						type: 'POST',
						url: 'php/add_apm.php',
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

				//UPDATE APM

				//Pegar os valores dos inputs
				$(".alterar").on("click", function(){
					$("#exibir_cod").text($(this).attr('cod'));
					$("#exibir_path").text($(this).attr('imagem'));
					$("#alterar_nm_produto").val($(this).attr('nome'));
					$("#alterar_vl_produto").val($(this).attr('valor'));
					$("#alterar_ds_produto").val($(this).attr('descricao'));
				});

				//Atualizar valores
				$('#alterarProduto').submit(function (e) {
					e.preventDefault();

					var formulario = new FormData(this);
					formulario.append('codigo', $("#exibir_cod").text());
					formulario.append('imagemAntiga', $("#exibir_path").text());
					
					$.ajax({
						type: 'POST',
						url: 'php/alterar_apm.php',
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
		<title>APM</title>
	</head>

	<body>
	<!-- INICIO DA DUVIDA!! -->
		<section class="apm-container">
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
					<li class="item-menu ativo">
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

			<div class="apm">
				<div class="apm-title">
					<h1>APM</h1>
					<p>Olá, aqui é a APM (Associação de Pais e Mestres)! Nessa área é possível somente visualizar todos os itens que são vendidos na nossa escola, caso você queira adquirir alguma coisa, terá que se redirecionar para a secretária da Etec de Itanhaém.</p>
				</div>
				<div class="apm-card-container">
				<?php 
					$sql = 'SELECT * FROM tb_apm';
					foreach ($conn->query($sql) as $row) {
				?>
					<div class="apm-group">
						<!-- inicio card -->
						<div class="apm-card">
							<img src="<?php echo $row['ds_imagem'];?>" alt="" class="card-img">
							<button data-bs-toggle="modal" data-bs-target="#editModal" class="alterar" cod="<?php echo $row['cd_apm'];?>" nome="<?php echo $row['nm_produto'];?>" valor="<?php echo $row['nr_valor']?>" descricao="<?php echo $row['ds_descricao'];?>" imagem="<?php echo $row['ds_imagem'];?>"><i class="bi bi-pencil-square edit-icon"></i></button>
							<a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i class="bi bi-trash-fill delete-icon"></i></a>
							<div class="card-info">
								<div class="card-text">
									<p class="card-title"><?php echo $row['nm_produto']; ?></p>
									<p class="card-sub"><?php echo $row['ds_descricao']; ?></p>
									<i class="bi bi-star-fill" style="color: #FFA401;" ></i>
									<i class="bi bi-star-fill" style="color: #FFA401;" ></i>
									<i class="bi bi-star-fill" style="color: #FFA401;" ></i>
									<i class="bi bi-star-fill" style="color: #FFA401;" ></i>
									<i class="bi bi-star-fill" style="color: #FFA401;" ></i>
								</div>
								<div class="price">
									<a href="#" class="btn btn-secondary"><?php echo $row['nr_valor']; ?></a>
								</div>
							</div>
						</div>
						<!-- fim card -->
					</div>
					
					<!-- Modal De Exclusao -->
					<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content custom-modal">
								<div class="modal-circle">
									<i class="bi bi-x-circle mt-5" style="color: #ff0000; font-size:5em;display: flex; align-items: center; justify-content: center;"></i>
								</div>
								<div class="modal-header" style="background-color: #fff; border: none; text-align: center; justify-content: center;">
									<h5 class="modal-title" style="color:#000; font-size:1.5em ">Você tem certeza?</h5>
								</div>
								<div class="modal-body" style="text-align: center;">
									<p>Você realmente deseja excluir esses registros? Este processo não pode ser desfeito.</p>
								</div>
								<div class="modal-footer" style="border: none; justify-content: center;">
									<a href="php/delete_apm.php?cod=<?php echo $row['cd_apm'];?>"><button type="button" class="btn btn-danger">Sim, Excluir</button></a>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
					<!-- fim do Modal De Exclusao -->
				<?php    		
					}
				?>
			</div>

			<!-- Modal de Alteração -->
			<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form id="alterarProduto" enctype="multipart/form-data">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="editModalLabel">Editar Produto</h1>
								<button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<!-- Inputs para a alteração -->
								<div class="mb-3">
									<label for="ds_imagem" class="form-label">Alterar imagem</label>
									<div class="input-group">
										<input type="file" name="alterarImagem" class="form-control" id="ds_imagem" accept="image/*">
										<button class="btn btn-outline-secondary" type="button" id="editButton">
											<i class="bi bi-pencil"></i> <!-- Ícone de editar -->
										</button>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										<label for="alterar_nm_produto" class="form-label">Novo Nome do Produto</label>
										<input type="text" name="titulo" class="form-control" id="alterar_nm_produto">
									</div>
									<div class="col">
										<label for="alterar_vl_produto" class="form-label preco">Novo Valor do Produto</label>
										<input type="text" name="valor" class="form-control" id="alterar_vl_produto">
									</div>
								</div>
								<div class="mb-3">
									<label for="alterar_ds_produto" class="form-label">Nova Descrição do Produto</label>
									<textarea name="descricao" class="form-control" id="alterar_ds_produto" rows="4"></textarea>
								</div>
								<p id="exibir_cod" style="display:none;"></p>
								<p id="exibir_path" style="display: none;"></p>
								<div id="exibe2"></div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-roxo" id="salvar_alt">Salvar Alterações</button>
									<button type="button" class="btn btn-azul" data-bs-dismiss="modal">Cancelar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Fim do modal de Alteração -->

			<!-- incio do modal E BOTAO QUE ABRE ELE -->
			<button type="button" class="btn btn-primary add" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				<i class="bi bi-plus-circle-fill"></i> <!-- Ícone de adição -->
			</button>

			<!-- Modal de ADICIONAR APM -->
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form id="addProduto" enctype="multipart/form-data">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Produto</h1>
								<button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="mb-3">
									<label for="ds_imagem" class="form-label">Imagem do Produto</label>
									<div class="input-group">
										<input type="file" name="ds_imagem" class="form-control" id="ds_imagem" accept="image/*">
										<button class="btn btn-outline-secondary" type="button" id="editButton">
											<i class="bi bi-pencil"></i> <!-- Ícone de editar -->
										</button>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col">
										<label for="nm_produto" class="form-label">Nome do Produto</label>
										<input type="text" name="nm_produto" class="form-control" id="nm_produto" maxlength="10">
									</div>
									<div class="col">
										<label for="nr_valor" class="form-label preco">Valor do Produto</label>
										<input type="text" name="nr_valor" class="form-control preco" id="nr_valor">
									</div>
								</div>
								<div class="mb-3">
									<label for="ds_descricao" class="form-label">Descrição do Produto</label>
									<textarea name="ds_descricao" class="form-control" id="ds_descricao" rows="4" maxlength="15"></textarea>
								</div>
							</div>
							<div id="exibe"></div>
							<div class="modal-footer">
								<button type="submit" id="salvar_novo" class="btn btn-roxo">Salvar</button>
								<button type="button" class="btn btn-azul" data-bs-dismiss="modal">Fechar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- fim do modal -->
		</section>
		<!-- FIM DA APM!! -->

		<!-- js -->
			<script src="js/menu.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  			<script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
		<!-- /js -->
	</body>
</html>
<?php
	}
?>