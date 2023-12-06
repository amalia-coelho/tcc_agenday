<?php
	include("php/conexao.php");
    session_start();
    if (!isset($_SESSION['email'])){
        header('Location: index.php');
    }else if ($_SESSION['id_nivel'] == 1){
		header("Location: adm-apm.php");
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
			<style>
				body .alert {
					background: #FFE1E3;
					border-left: 8px solid #FF4356;
					position: relative;
				}

				.alert .bi-exclamation-circle {
					position: absolute;
					left: 20px;
					top: 50%;
					transform: translateY(-50%);
					color: #FF455A;
					font-size: 30px;
				}

				body .alert .msg {
					padding: 0 40px;
					color: #DC7777;
				}

				body .alert .close-btn {
					position: absolute;
					right: 0;
					top: 50%;
					transform: translateY(-50%);
					background-color: #FF99A4;
					padding: 9px 16px;
					cursor: pointer;
				}

				body .alert .close-btn:hover {
					background-color: #FC4B55;
				}


				body .alert .bi-x-lg {
					color: #FF455A;
					font-size: 22px;
					line-height: 40px;
				}

				.alert.hide {
					display: none;
				}

				.alert.show {
					animation: show_slide 1s ease forwards;
				}
			</style>
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
				
			<!-- search bar-->

			<div class="inner-form">
            <div class="input-field">
              <button class="btn-search" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
              </button>
              <input id="search" type="text" placeholder="Pesquise aqui"/>
            </div>
          </div>

			<!-- fim da search bar-->

				<div class="apm-card-container">
					<?php 
					$sql = 'SELECT * FROM tb_apm';
					$rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
					
					if (count($rows) > 0) {
						foreach ($rows as $row) {
					?>
					<div class="apm-group">
						<!-- inicio card -->
						<div class="apm-card">
							<img src="<?php echo $row['ds_imagem'];?>" alt="" class="card-img">
							<div class="card-info">
								<div class="card-text">
									<p class="card-title"><?php echo $row['nm_produto']; ?></p>
									<p class="card-sub"><?php echo $row['ds_descricao']; ?></p>
									<i class="bi bi-star-fill" style="color: #FFA401;"></i>
									<i class="bi bi-star-fill" style="color: #FFA401;"></i>
									<i class="bi bi-star-fill" style="color: #FFA401;"></i>
									<i class="bi bi-star-fill" style="color: #FFA401;"></i>
									<i class="bi bi-star-fill" style="color: #FFA401;"></i>
								</div>
								<div class="price">
									<a href="#" class="btn btn-secondary"><?php echo $row['nr_valor']; ?></a>
								</div>
							</div>
						</div>
						<!-- fim card -->
					</div>
				<?php    		
						}
					} else{
						echo "<p class='mt-5' style='font-size:18px;'>Desculpe, não temos produtos disponíveis no momento. Confira novamente mais tarde!</p>";
					}
				?>
			</div>
		</section>
		<!-- FIM DA APM!! -->

		<!-- js -->
			<script src="js/menu.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  			<script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
			<SCRIpt>
				  $(document).ready(function(){
					// Função de filtro
					function filterCards() {
					var searchTerm = $("#search").val().toLowerCase();

					$(".apm-card").each(function(){
						var cardTitle = $(this).find(".card-title").text().toLowerCase();
						var cardSub = $(this).find(".card-sub").text().toLowerCase();

						if(cardTitle.includes(searchTerm) || cardSub.includes(searchTerm)){
						$(this).show();
						} else {
						$(this).hide();
						}
					});
					}
					// Evento de clique para o span "Limpar"
					$("#clearSearch").click(function(){
					// Limpa o valor do campo de pesquisa
					$("#search").val('');

					// Executa a função de filtro
					filterCards();
					});
					// Evento de clique para o botão de pesquisa
					$(".btn-search").click(function(){
					filterCards();
					});

					// Evento de tecla para pesquisa em tempo real
					$("#search").on('keyup', function(){
					filterCards();
					});
				});
								const input = document.getElementById("search-input");
				const searchBtn = document.getElementById("search-btn");

				const expand = () => {
				searchBtn.classList.toggle("close");
				input.classList.toggle("square");
				};

				searchBtn.addEventListener("click", expand);
			</SCRIpt>
		<!-- /js -->
	</body>
</html>
<?php
	}
?>