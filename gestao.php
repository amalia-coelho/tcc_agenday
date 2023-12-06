<?php
	session_start();
	include('php/conexao.php');
	if (!isset($_SESSION['email'])) {
		header('Location: index.php');
	} else if ($_SESSION['id_nivel'] == 1){
		header("Location: adm-gestao.php");
	}else{
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/gestao.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/perfilfundo.scss">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<!-- /css -->

	<!-- js -->
	
  	<title>Gestão</title>
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
				<li class="item-menu">
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
				<li class="item-menu ativo">
					<a href="#">
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
	</section>
	<main>
		<div class="comuni">
			<h1>Gestão Pedagógica</h1>
		</div>

<!-- search bar-->

<div class="inner-form mt-5">
	<div class="input-field">
<button class="btn-search" type="button">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
</svg>
</button>
<input id="search" type="text" placeholder="Pesquise aqui"/>
</div>
</div>
<div class="suggestion-wrap">
<span>Etec</span>
<span>Evento</span>
<span>Escolar</span>
<span>Aviso</span>
<span style="background:red" id="clearSearch">Limpar <i class="bi bi-x-circle-fill"></i></span>
</div>

<!-- fim da search bar-->
		
		<section class="gestao">
			<?php
				$sql = "SELECT * FROM tb_gestao";
				foreach ($conn->query($sql) as $row) {?>
					<div class="gestao-container">
				<div class="gestao-users">
					<img src="<?php echo $row['ds_imagem'];?>" alt="Foto do Usuário">
					<p><?php echo $row['nm_membro'];?></p>
					<p><?php echo $row['ds_cargo'];?></p>
				</div>
				<?php
				}
				?>
			</div>
		</section>
	</main>
  <!-- js -->
  <script src="js/duvidas.js"></script>
  <script src="js/menu.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
<script>
	
$(document).ready(function(){
    // Evento de clique para spans dentro de suggestion-wrap
    $(".suggestion-wrap span").click(function(){
        // Atualiza o valor do campo de pesquisa com o texto do span clicado
        $("#search").val($(this).text());

        // Executa a função de filtro
        filterCards();
    });

    // Função de filtro
    function filterCards() {
        var searchTerm = $("#search").val().toLowerCase();

        $(".gestao-users").each(function(){
            var memberName = $(this).find("p:first").text().toLowerCase();
            var memberPosition = $(this).find("p:last").text().toLowerCase();

            if(memberName.includes(searchTerm) || memberPosition.includes(searchTerm)){
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
</script>
</html>
<?php
	}
?>