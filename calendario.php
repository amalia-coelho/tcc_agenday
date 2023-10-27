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
	<link rel="stylesheet" href="css/calendario.css">
	<link rel="stylesheet" href="css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <link href="css/custom.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
	integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- /css -->

	<!-- js -->
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
	<title>Calendário</title>
</head>

<body>
	<!-- INICIO DA DUVIDA!! -->
	<section class="calendario-container">
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
				<a href="index.html">
				<span class="icon"><i class="bi bi-house-door-fill"></i></span>
				<span class="txt-link">Home</span>
				</a>
			</li>
			<li class="item-menu ativo">
				<a href="#">
				<span class="icon"><i class="bi bi-calendar2-week-fill"></i></span>
				<span class="txt-link">Calendário</span>
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
	<!-- fim do menu -->
	<!-- inicio do calendario -->
	<div class="area">

<ul class="circles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
</ul>

    <h2 class="mb-4"></h2>

    <span id="msg"></span>

    <div id='calendar'></div>

    <!-- Modal Visualizar -->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar o Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <dl class="row">

                        <dt class="col-sm-3">ID: </dt>
                        <dd class="col-sm-9" id="visualizar_id"></dd>

                        <dt class="col-sm-3">Título: </dt>
                        <dd class="col-sm-9" id="visualizar_title"></dd>

                        <dt class="col-sm-3">Início: </dt>
                        <dd class="col-sm-9" id="visualizar_start"></dd>

                        <dt class="col-sm-3">Fim: </dt>
                        <dd class="col-sm-9" id="visualizar_end"></dd>

                    </dl>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadastrarModalLabel">Cadastrar o Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgCadEvento"></span>

                    <form method="POST" id="formCadEvento">

                        <div class="row mb-3">
                            <label for="cad_title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" name="cad_title" class="form-control" id="cad_title" placeholder="Título do evento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_start" class="col-sm-2 col-form-label">Início</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_start" class="form-control" id="cad_start">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_end" class="col-sm-2 col-form-label">Fim</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="cad_end" class="form-control" id="cad_end">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_color" class="col-sm-2 col-form-label">Cor</label>
                            <div class="col-sm-10">
                                <select name="cad_color" class="form-control" id="cad_color">
                                    <option value="">Selecione</option>
                                    <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                    <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                    <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                    <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                    <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="btnCadEvento" class="btn btn-success" id="btnCadEvento">Cadastrar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src='js/index.global.min.js'></script>
    <script src="js/bootstrap5/index.global.min.js"></script>
    <script src='js/core/locales-all.global.min.js'></script>
    <script src='js/custom.js'></script>


	<!-- fim do calendario -->


	<!-- js -->
	<script src="js/menu.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

</body>

</html>
<?php
}
?>