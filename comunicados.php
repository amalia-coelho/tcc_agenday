<?php
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
		<link rel="stylesheet" href="css/comunicado.css">
		<link rel="stylesheet" href="css/menu.css">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- /css -->

	<!-- js -->
		<script src="https://unpkg.com/scrollreveal"></script>
		<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#salvar").click(function(){
					// declaração de variáveis
					var descricao = $('#ds_descricao').val();
					var data_comunicado = $('#dt_comunicado').val();
					var titulo = $('#nm_titulo').val();

					$.ajax({
					url: "php/script_addComunicado.php",
					type: "POST",
					data: "descricao="+descricao+"&data_comunicado="+data_comunicado+"&titulo="+titulo,
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
						
						//resetar o select
						$('#id_turma option:first').prop('selected',true);
					}).fail(function(jqXHR, textStatus ) {
						console.log("Request failed: " + textStatus);
					});
				});
			});
		</script>
	<!-- /js -->
	<title>Comunicados</title>
</head>

	<body>
	<!-- INICIO DA DUVIDA!! -->
	<section class="-container">
		<!-- INICIO MENU  -->
		<nav class="menu-lateral">
		<div class="btn-expandir">
			<i class="bi bi-list" id="btn-exp"></i>
		</div>
		<ul>
			<li class="item-menu">
			<a href="perfil.html">
				<span class="icon"><i class="bi bi-person-fill"></i></span>
				<span class="txt-link">Usuário</span>
			</a>
			</li>
			<li class="item-menu">
			<a href="#">
				<span class="icon"><i class="bi bi-house-door-fill"></i></span>
				<span class="txt-link">Home</span>
			</a>
			</li>
			<li class="item-menu">
			<a href="#">
				<span class="icon"><i class="bi bi-calendar2-week-fill"></i></span>
				<span class="txt-link">Calendário</span>
			</a>
			</li>
			<li class="item-menu ativo">
			<a href="#">
				<span class="icon"><i class="bi bi-megaphone-fill"></i></span>
				<span class="txt-link">Comunicados</span>
			</a>
			</li>
			<li class="item-menu">
			<a href="apm.html">
				<span class="icon"><i class="bi bi-cart4"></i></span>
				<span class="txt-link">APM</span>
			</a>
			</li>
			<li class="item-menu">
				<a href="painel.html">
					<span class="icon"><i class="bi bi-heart-fill"></i></span>
					<span class="txt-link">Saúde</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="#">
					<span class="icon"><i class="bi bi-person-workspace"></i></span>
					<span class="txt-link">Gestão</span>
				</a>
			</li>
			<li class="item-menu">
			<a href="duvidas.html">
				<span class="icon"><i class="bi bi-question-lg"></i></span>
				<span class="txt-link">Dúvidas</span>
			</a>
			</li>
			<li class="item-menu">
			<a href="gerenciamento.html">
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
				include('php/conexao.php');

				$sql = "SELECT * FROM tb_comunicado";
	
				foreach ($conn->query($sql) as $item){?>
					<section class="comunicado horizontal">
						<div class="comunicado-image">
							<img src="img/foto.webp" alt="Imagem do comunicado">
						</div>
						<div class="comunicado-content">
							<div class="comunicado-header">
								<h2><?php echo $item['nm_titulo'];?></h2>
								<p class="date"><?php echo $item['dt_postagem'];?></p>
							</div>
							<p class="comunicado-text"><?php echo $item['ds_descricao'];?></p>
							<button data-bs-toggle="modal" data-bs-target="#editModal" style="border:none;">
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
		    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		      aria-labelledby="editModalLabel" aria-hidden="true">
		      <div class="modal-dialog modal-dialog-centered">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h1 class="modal-title fs-5" id="editModalLabel">Editar Comunicado</h1>
		            <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
		          </div>
		          <div class="modal-body">
		                       <form>
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
		                <label for="productTitle" class="form-label">Alterar Título do Comunicado</label>
		                <input type="text" class="form-control" id="productTitle">
		              </div>
		              
		              <div class="row mb-3 altura-curso">
		                <div class="input-group col">
		                  <input placeholder="Data" style="height: 2rem !important;" type="text" class="form-control date" id="dateInput" accept="image/*">
		                  <input placeholder="Hora" style="height: 2rem !important;" class="form-control time" type="text" id="timeInput">
		                  </input>
		                </div>  
		                <div class="col">
		                  <div class="select-btn">
		                    <span class="btn-text">Selecionar Curso</span>
		                    <i class="bi bi-chevron-down"></i>
		                    </div>
		                    <ul class="list-itens">
								<li class="item" id="all-select">
		                        	<label class="form-check-label" for="selectAllOptions">Todos</label>
								</li>
		                        <li class="item">
		                            <span class="checkbox">
		                                <i class="bi bi-check-lg"></i>
		                            </span>
		                            <span class="item-text">1MIN</span>
		                        </li>
		                        <li class="item">
		                          <span class="checkbox">
		                              <i class="bi bi-check-lg"></i>
		                          </span>
		                          <span class="item-text">1MAM</span>
		                          
		                      </li>
		                      <li class="item">
		                        <span class="checkbox">
		                            <i class="bi bi-check-lg"></i>
		                        </span>
		                        <span class="item-text">1MAD</span>
		                    </li>
		                      <li class="item">
		                        <span class="checkbox">
		                            <i class="bi bi-check-lg"></i>
		                        </span>
		                        <span class="item-text">2MIN</span>
		                    </li>
		                      <li class="item">
		                        <span class="checkbox">
		                            <i class="bi bi-check-lg"></i>
		                        </span>
		                        <span class="item-text">2MAM</span>
		                    </li>
		                      <li class="item">
		                        <span class="checkbox">
		                            <i class="bi bi-check-lg"></i>
		                        </span>
		                        <span class="item-text">2MAD</span>
		                    </li>
		                      <li class="item">
		                        <span class="checkbox">
		                            <i class="bi bi-check-lg"></i>
		                        </span>
		                        <span class="item-text">3MIN</span>
		                    </li>
		                      <li class="item">
		                        <span class="checkbox">
		                            <i class="bi bi-check-lg"></i>
		                        </span>
		                        <span class="item-text">3MAM</span>
		                    </li>
		                      <li class="item">
		                        <span class="checkbox">
		                            <i class="bi bi-check-lg"></i>
		                        </span>
		                        <span class="item-text">3MAD</span>
		                    </li>
		                    
		                    </ul>
		                </div>
		              </div>
		              <div class="mb-3">
		                <label for="productDescription" class="form-label">Alterar Descrição</label>
		                <textarea class="form-control" id="productDescription" rows="4"></textarea>
		              </div>
		            </form>
		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-roxo">Salvar Alterações</button>
		            <button type="button" class="btn btn-azul" data-bs-dismiss="modal">Cancelar</button>
		          </div>
		        </div>
		      </div>
		    </div>
		    <!-- Fim do modal de Alteração -->
    
			<!-- inicio do modal -->
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
								<label for="ds_imagem" class="form-label">Imagem do comunicado</label>
								<div class="input-group">
									<input type="file" class="form-control" id="ds_imagem" accept="image/*">
									<button class="btn btn-outline-secondary" type="button" id="editButton">
									<i class="bi bi-pencil"></i> <!-- Ícone de editar -->
									</button>
								</div>
							</div>
							<div class="mb-3">
								<label for="nm_titulo" class="form-label">Título</label>
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
										<li class="item" id="all-select">
											<label class="form-check-label" for="selectAllOptions">Todos</label>
										</li>
										<li class="item">
											<span class="checkbox">
												<i class="bi bi-check-lg"></i>
											</span>
											<span class="item-text">1MIN</span>
										</li>
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
							<button type="button" class="btn btn-azul" data-bs-dismiss="modal" id="fechar">Fechar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- fim do modal ADD -->

		</main>
		<!-- js -->
			<script src="js/duvidas.js"></script>
			<script src="js/menu.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
		<!-- /js -->
	</body>

</html>
<?php
    }
?>