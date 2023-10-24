<?php
  session_start();
  if($_SESSION['email']){
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lote.css">
  <link rel="stylesheet" href="css/menu.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
    integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    ul li.item-menu a {
      padding: 20px 34px !important;
    }

    ul li.item-menu::after {
      margin-left: 34px !important;

    }

    ul li.ativo::before {
      margin-left: 34px !important;
    }

    @media screen and (max-width: 480px) {

      ul li.item-menu a {
        padding: 20px .1rem !important;
      }

      ul li.item-menu::after {
        margin-left: 0px !important;

      }

      ul li.ativo::before {
        margin-left: 0 px !important;
      }

      /* fim do menu */
    }
  </style>
  <!-- /css -->

  <!-- js -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
        <script type="text/javascript">
      		$(document).ready(function(){
      			$('#botaoEnviar').hide();
              	//ENVIAR CSV
        		$('#add_usuarios').submit(function (e) {
          			e.preventDefault();
					var formulario = new FormData(this); // Crie um objeto FormData com os dados do formulário
	          		$.ajax({
		            	type: 'POST',
		            	url: 'php/ler_novosAlunos.php',
		            	data: formulario,
		            	contentType: false,
		            	processData: false,
		          	}).done(function(tabela){         
		            	$("#exibe").html(tabela);
		            	$('#botaoEnviar').show();
		          	}).fail(function(jqXHR, textStatus ) {
		            	console.log("Request failed: " + textStatus);
		          	});
		        });

				$('#enviarUsuarios').click(function() {
                	var usuarios = [];
                	$('#tabelaUsuarios tbody tr').each(function() {
                    	var rm = $(this).find('.rm').text();
                    	var nome = $(this).find('.nome').text();
                    	var email = $(this).find('.email').text();

						var user = {
							rm: rm,
							nome: nome,
							email: email
						};

                      	usuarios.push(user);
                  	});

                  	$.ajax({
                    	type: 'POST',
                    	url: 'php/cadastrar_lote.php',
                    	data: { usuarios: usuarios },
                  	}).done(function(resposta){         
                    	$("#resposta").html(resposta);
                  	}).fail(function(jqXHR, textStatus ) {
                    	console.log("Request failed: " + textStatus);
                  	});
              	});
          	});
        </script>
	<!-- /js -->
	<title>Gerenciamento</title>
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
          <a href="perfil.html">
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
        <li class="item-menu">
          <a href="#">
            <span class="icon"><i class="bi bi-calendar2-week-fill"></i></span>
            <span class="txt-link">Calendário</span>
          </a>
        </li>
        <li class="item-menu">
          <a href="comunicados.html">
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
        <li class="item-menu ativo">
          <a href="gerenciamento.html">
            <span class="icon"><i class="bi bi-gear-fill"></i></span>
            <span class="txt-link">Gerenciamento</span>
          </a>
        </li>
        <li class="item-menu">
          <a href="logout.php">
            <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
            <span class="txt-link">Sair</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- FIM DO MENU -->
  </section>



	<section class="adm-container">
		<div class="adm">
			<div class="adm-title row">
				<div>
	  				<h1>Cadastro de Alunos</h1>
				</div>
			</div>
		</div>
		<div class="adm-img">
			<img src="img/spreadsheets-animate.svg" alt="Figura Inicial" class="adm-element">
		</div>
		<!-- upload -->
		<div class="adm-content mt-5">
			<form class="form-container" id="add_usuarios" enctype='multipart/form-data'>
				<div class="upload-files-container">
		  			<div class="drag-file-area">
		    			<span class="material-icons-outlined upload-icon"> file_upload </span>
		    			<h3 class="dynamic-message"> Arraste e solte um arquivo aqui </h3>
		    			<label class="label" style="position: relative; left: -90px;"> 
		    				<span id="or">ou</span>
		    				<span class="browse-files"> 
	    					<input type="file" class="default-file-input" name="registro_alunos" id="registro_alunos" accept=".csv">
	    					<span class="browse-files-text">selecione</span> <span>do seu dispositivo</span></span>
	    				</label>
	    			</div>
		  			<span class="cannot-upload-message"> 
		  			<span class="material-icons-outlined">error</span> 
		  			<label class="selecione">Selecione um arquivo primeiro</label> 
		  			<span class="material-icons-outlined cancel-alert-button">cancel</span> </span>
		  			<div class="file-block">
		    			<div class="file-info">
		    				<span class="material-icons-outlined file-icon">description</span> 
		    				<span class="file-name"></span> | <span class="file-size"></span> 
		    			</div>
		    			<span class="material-icons remove-file-icon">delete</span>
		  			</div>
		  			<button type="submit" class="upload-button"> Upload </button>
				</div>
			</form>
			<!-- fim do upload -->
			
			<!-- table -->
			<div class="tabela-gera mt-4">
				<table class="table table-hover">
					<thead class="thead">
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Turma/Cargo</th>
							<th scope="col">Síndrome</th>
							<th scope="col">Nível</th>
							<th scope="col">Email</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody class="table-bordered" id="table">
						<tr>
					  		<td onclick="habilitarEdicao(this)">Eric Junokas Oliveira</td>
						  	<td onclick="abrirSelect(this)">
					    		<!-- Adicione o select oculto na célula -->
						    	<select class="hidden-select">
					      			<option value="3MIN">3MIN</option>
					      			<option value="3MAM">3MAM</option>
				      				<option value="3MAD">3MAD</option>
				      				<option value="Professor">Professor</option>
						    	</select>
					  	</td>
							<td onclick="habilitarEdicao(this)">Não</td>
							<td onclick="habilitarEdicao(this)">1</td>
							<td onclick="habilitarEdicao(this)">ericazeitona@gmail.com</td>
							<td class="edit" style="width: 100px;">
						    	<a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i class="bi bi-trash"></i></a>
						  	</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- fim da table -->

			<div class="voltar mt-4">
				<a href="gerenciamento.html" style="color:var(--roxo)">Voltar</a>
			</div>
			<div class="revealbtn mt-1" style="display: flex;">
				<div>
					<button class="ent" id="enviarUsuarios">Salvar Alterações</button>
				</div>
			</div>
			<div id="exibe">
				
			</div>
			<!-- search bar -->
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" id="search" placeholder='Pesquisar - Ex: 3MIN' aria-label="Search">
			</form>
			<!-- final search bar -->
		</div>
  	</section>

	<!-- FIM DA PÁGINA!! -->
	<script>
	    function habilitarEdicao(td) {
			// Define o atributo contentEditable como true para habilitar a edição.
			td.contentEditable = true;
			// Adiciona uma classe CSS para indicar que a célula está em modo de edição.
			td.classList.add('editavel');
			// Define o foco na célula para que o usuário possa começar a editar imediatamente.
			td.focus();

			// Defina um ouvinte de evento de teclado para detectar a tecla "Enter" e desabilitar a edição.
			td.addEventListener('keydown', function (event) {
			    if (event.key === "Enter") {
			        event.preventDefault(); // Evita que a quebra de linha seja inserida
			        desabilitarEdicao(td);
			    }
			});

			// Defina um evento de clique para desabilitar a edição quando a célula perder o foco.
			td.addEventListener('blur', function () {
			    desabilitarEdicao(td);
			});
		}

	    function desabilitarEdicao(td) {
	        // Define o atributo contentEditable como false para desabilitar a edição.
	        td.contentEditable = false;
	        // Remove a classe CSS de edição.
	        td.classList.remove('editavel');
	    }    
	</script>
  	<!-- js -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js" integrity="sha512-BkBgWiL0N/EFIbLZYGTgbksKG5bS6PtwnWvVk3gccv+KhtK/4wkLxCRGh+kelKiXx7Ey4jfTabLg3AEIPC7ENA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="js/lote.js"></script>
  	<script>
    	var $rows = $('#table tr');
    	$('#search').keyup(function () {
	      	var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
	        reg = RegExp(val, 'i'),
	        text;

	      	$rows.show().filter(function () {
	        	text = $(this).text().replace(/\s+/g, ' ');
	        	return !reg.test(text);
	      	}).hide();
    	});
	</script>
	<script src="js/menu.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  }
?>