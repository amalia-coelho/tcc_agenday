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
  <script>

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
      <li class="item-menu ativo">
				<a href="adm-perfil.php">
				<span class="icon"><i class="bi bi-person-fill"></i></span>
				<span class="txt-link">Usuário</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="adm-calendario.php">
					<span class="icon"><i class="bi bi-house-door-fill"></i></span>
					<span class="txt-link">Calendário</span>
				</a>
			</li>
        <li class="item-menu">
				<a href="adm-comunicados.php">
				<span class="icon"><i class="bi bi-megaphone-fill"></i></span>
				<span class="txt-link">Comunicados</span>
				</a>
			</li>
			<li class="item-menu ">
				<a href="adm-apm.php">
				<span class="icon"><i class="bi bi-cart4"></i></span>
				<span class="txt-link">APM</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="adm-gestao.php">
				<span class="icon"><i class="bi bi-person-workspace"></i></span>
				<span class="txt-link">Gestão</span>
				</a>
			</li>
        <li class="item-menu">
				<a href="adm-duvidas.php">
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



  <section class="adm-container">
    <div class="adm">
      <div class="adm-title row">
        <div>
          <h1>Cadastro de Alunos</h1>
        </div>
      </div>
      <!-- <div class="adm-filtro mt-5 mb-5">
        <div class="filtro-title">
          <p>Filtrar por:</p>
        </div>
        <div class="filtro-btn">
          <div class="revealbtn">
            <a class="ent" href="#">Alunos</a>
          </div>
          <div class="revealbtn">
            <a class="ent" href="#">Professores</a>
          </div>
          <div class="revealbtn">
            <a class="ent" href="#">Turma</a>
          </div>
          <div class="revealbtn">
            <a class="ent" href="#">Gestão</a>
          </div>
          <div class="revealbtn">
            <a class="ent" href="#">Saúde</a>
          </div>
        </div>
      </div> -->
    </div>
    <div class="adm-img">
      <img src="img/spreadsheets-animate.svg" alt="Figura Inicial" class="adm-element">
    </div>
    </div>
    <!-- upload -->
    <div class="adm-content mt-5">
      <form class="form-container" enctype='multipart/form-data'>
        <div class="input-group">
          <input type="file" class="upload" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </form>
      <div class="revealbtn" style="display: flex;">
        <div><a class="env" href="#">Enviar</a></div>
      </div>
      <!-- fim do upload -->
      <div class="voltar mt-4"><a href="ADM-GERENCIAMENTO.php" style="color: var(--roxo);">Voltar</a></div>
      <div class="revealbtn mt-1" style="display: flex;">
        <div><a class="ent" href="#">Salvar Alterações</a></div>
      </div>

      <!-- search bar -->
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2 mt-5" type="search" id="search" placeholder='Pesquisar - Ex: 3MIN'
          aria-label="Search">
      </form>

      <!-- final search bar -->


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
            <tr>
              <td onclick="habilitarEdicao(this)">Maytê Bronzatto Palomo</td>
              <td onclick="habilitarEdicao(this)">3MAM</td>
              <td onclick="habilitarEdicao(this)">Gostosa</td>
              <td onclick="habilitarEdicao(this)">1</td>
              <td onclick="habilitarEdicao(this)">ericazeitona@gmail.com</td>
              <td class="edit" style="width: 100px;"><a href="#" data-bs-toggle="modal"
                  data-bs-target="#confirmDeleteModal"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
            <tr>
              <td onclick="habilitarEdicao(this)">Iago Marques Pinto</td>
              <td onclick="habilitarEdicao(this)">3MIN</td>
              <td onclick="habilitarEdicao(this)">Não</td>
              <td onclick="habilitarEdicao(this)">1</td>
              <td onclick="habilitarEdicao(this)">ericazeitona@gmail.com</td>
              <td class="edit" style="width: 100px;"><a href="#" data-bs-toggle="modal"
                  data-bs-target="#confirmDeleteModal"><i class="bi bi-trash"></i></a></td>
            </tr>
            <tr>
              <td onclick="habilitarEdicao(this)">Laura Aparecida Meirinho</td>
              <td onclick="habilitarEdicao(this)">3MAM</td>
              <td onclick="habilitarEdicao(this)">Não</td>
              <td onclick="habilitarEdicao(this)">1</td>
              <td onclick="habilitarEdicao(this)">ericazeitona@gmail.com</td>
              <td class="edit" style="width: 100px;"><a href="#" data-bs-toggle="modal"
                  data-bs-target="#confirmDeleteModal"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
            <tr>
              <td onclick="habilitarEdicao(this)">Laura Ongaro Camargo</td>
              <td onclick="habilitarEdicao(this)">3MAM</td>
              <td onclick="habilitarEdicao(this)">Não</td>
              <td onclick="habilitarEdicao(this)">1</td>
              <td onclick="habilitarEdicao(this)">ericazeitona@gmail.com</td>
              <td class="edit" style="width: 100px;"><a href="#" data-bs-toggle="modal"
                  data-bs-target="#confirmDeleteModal"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- fim da table -->
    </div>
  </section>

  <!-- FIM DA DÚVIDA!! -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"
    integrity="sha512-BkBgWiL0N/EFIbLZYGTgbksKG5bS6PtwnWvVk3gccv+KhtK/4wkLxCRGh+kelKiXx7Ey4jfTabLg3AEIPC7ENA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>