<?php
session_start();
include('php/conexao.php');

// Verifica se o usuário está autenticado
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit(); // Certifique-se de sair do script após redirecionar
} else {
    // Obtém informações do usuário logado (presumindo que 'id_nivel' seja um campo na tabela de usuários)
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT id_nivel FROM tb_usuario WHERE ds:email = :email");
    $stmt->execute(array(':email' => $email));
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o 'id_nivel' do usuário é igual a 1
    if ($_SESSION['id_nivel'] == 2) {
        header('Location: index.php');
        exit(); // Certifique-se de sair do script após redirecionar
    }?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/adm.css">
  <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/selectcheck.css">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
    integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- js -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
  <script src="js/jquery.maskMoney.min.js"></script>
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
      <li class="item-menu">
				<a href="perfil.php">
				<span class="icon"><i class="bi bi-person-fill"></i></span>
				<span class="txt-link">Usuário</span>
				</a>
			</li>
      <li class="item-menu">
				<a href="ADM-CALENDARIO.php">
					<span class="icon"><i class="bi bi-house-door-fill"></i></span>
					<span class="txt-link">Calendário</span>
				</a>
			</li>
        <li class="item-menu">
				<a href="ADM-COMUNICADOS.php">
				<span class="icon"><i class="bi bi-megaphone-fill"></i></span>
				<span class="txt-link">Comunicados</span>
				</a>
			</li>
			<li class="item-menu ">
				<a href="ADM-APM.php">
				<span class="icon"><i class="bi bi-cart4"></i></span>
				<span class="txt-link">APM</span>
				</a>
			</li>
			<li class="item-menu">
				<a href="ADM-GESTAO.php">
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
			<li class="item-menu ativo">
				<a href="ADM-GERENCIAMENTO.php">
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



  <section class="adm-container">
    <div class="adm">
      <div class="adm-title row">
        <div>
          <h1>Gerenciamento</h1>
        </div>
        <div class="revealbtn" style="margin-left: 15rem;">
          <a class="ent" href="#">Cadastrar</a>
          <a class="ent" href="#">Salvar Alterações</a>
        </div>
      </div>
      <div class="adm-filtro mt-5 mb-5">
        <div class="filtro-title">
          <p>Filtrar por:</p>
        </div>
        <div class="filtro-btn turma">
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
        <div class="filtro-btn sindrome">
          <div class="col">
                  <div class="select-btn">
                    <span class="btn-text">Selecionar Cargo</span>
                    <i class="bi bi-chevron-down"></i>
                  </div>
                  <ul class="list-itens">
                    <li class="a" id="all-select" style="cursor:pointer;">
                      <label class="form-check-label" for="selectAllOptions" style="cursor:pointer;">Todos</label>
                    </li>
                        <li class="item">
                          <!-- Checkbox oculto -->
                          <input type="checkbox" class="checkbox" name="prof" value="prof" id="prof">
                          <label class="checkbox-label" for="prof"></label>
                          </span>
                          <span class="item-text">Professor</span>
                        </li>
                        <li class="item">
                          <!-- Checkbox oculto -->
                          <input type="checkbox" class="checkbox" name="prof" value="prof" id="prof">
                          <label class="checkbox-label" for="prof"></label>
                          </span>
                          <span class="item-text">Gestão</span>
                        </li>
                        <li class="item">
                          <!-- Checkbox oculto -->
                          <input type="checkbox" class="checkbox" name="prof" value="prof" id="prof">
                          <label class="checkbox-label" for="prof"></label>
                          </span>
                          <span class="item-text">Representante</span>
                        </li>
                        <li class="item">
                          <!-- Checkbox oculto -->
                          <input type="checkbox" class="checkbox" name="prof" value="prof" id="prof">
                          <label class="checkbox-label" for="prof"></label>
                          </span>
                          <span class="item-text">Aluno</span>
                        </li>
                  </ul>
                </div>
        </div>
      </div>
    </div>
    <div class="adm-img" style="z-index: -1">
      <img src="img/spreadsheets-animate.svg" alt="Figura Inicial" class="adm-element">
    </div>


    <div class="adm-content mt-5">
      <!-- search bar -->
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" id="search" placeholder='Pesquisar - Ex: 3MIN'
          aria-label="Search">
      </form>

      <!-- final search bar -->


      <!-- table -->

      <div class="tabela-gera mt-4">

        <table class="table table-hover">
          <thead class="thead">
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Turma</th>
              <th scope="col">Síndrome</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody class="table-bordered" id="table">
            <tr>
              <td>Eric Junokas Oliveira</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Maytê Bronzatto Palomo</td>
              <td>3MAM</td>
              <td>Gostosa</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Iago Marques Pinto</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a></td>
            </tr>
            <tr>
              <td>Laura Aparecida Meirinho</td>
              <td>3MAM</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Laura Ongaro Camargo</td>
              <td>3MAM</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Amauri Matematico Silva</td>
              <td>Professor</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Carla Modernismo Pereira</td>
              <td>Professor</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Giancarros Marques Ceolin</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Xavinho Lucido Amongus</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Minicius Yasuo Pequeno</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Miguerle Padeiro Cacetinho</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Wesley Casteldelli Gartic</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Gabriel Aisten</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Guti Guti</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Pitheozinho Durante</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Gordao Magrao Mediano</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Raphael Cabeça de Nós Todos</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Fakeyell Do Grau</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
            <tr>
              <td>Richard dos Efeitos Sonoros</td>
              <td>3MIN</td>
              <td>Não</td>
              <td class="edit" style="width: 100px;"><a href="#"><i class="bi bi-pencil"></i></a> <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"><i
                    class="bi bi-trash" ></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </section>

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
              <a href="php/delete_apm.php?cd=<?php echo $row['cd_apm'];?>"><button type="button" class="btn btn-danger">Sim, Excluir</button></a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- fim do Modal De Exclusao -->

  <!-- FIM DA DÚVIDA!! -->

  <!-- js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"
    integrity="sha512-BkBgWiL0N/EFIbLZYGTgbksKG5bS6PtwnWvVk3gccv+KhtK/4wkLxCRGh+kelKiXx7Ey4jfTabLg3AEIPC7ENA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  <script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
  <script src="js/select-gerenciamento.js"></script></body>

</html>
<?php
}
?>