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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/gestao.css">
  <link rel="stylesheet" href="css/menu.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
    integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- /css -->

  <!-- js -->
  <script src="https://unpkg.com/scrollreveal"></script>
  
  <!-- /js -->

  <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#salvar_novo").click(function(){
					var nm_membro = $("#nm_membro").val();
					var ds_cargo = $("#ds_cargo").val();
					$.ajax({
					url: "php/script_gestao.php",
					type: "POST",
					data: "nm_membro="+nm_membro+"&ds_cargo="+ds_cargo,
					dataType: "html"
					
					}).done(function(resposta) {
            $("#nm_membro").val(' ');
						$("#ds_cargo").val(' ');

					}).fail(function(jqXHR, textStatus ) {
					console.log("Request failed: " + textStatus);

					}).always(function() {
						console.log("completou");
					});
				});
			});
		</script>



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
            <a href="#">
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
            <a href="duvidas.html">
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
            <a href="logout.php">
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

      <?php 
				require('php/conexao.php');
				$sql = 'SELECT * FROM tb_gestao';
				foreach ($conn->query($sql) as $row) {
			?>

        <section class="gestao">
              <div class="gestao-container">
                <div class="gestao-users">
                  <img src="img/perfil1.jpg" alt="Foto do Usuário">
                  <button data-bs-toggle="modal" data-bs-target="#editModal" ><i
                    class="bi bi-pencil-square edit-icon"></i></button>
                    <a href="php/delete_gestao.php?cd=<?php echo $row['cd_membro'];?>"><i class="bi bi-trash-fill delete-icon"></i></a>
                  <p><?php echo $row['nm_membro']; ?></p>
                  <p><?php echo $row['ds_cargo']; ?></p>
                </div>
              </div>
        </section>
      <?php    		
          }
        ?>
    </main>
           <!-- Modal de Alteração -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Editar Membro</h1>
          <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <!-- Inputs para a alteração -->
            <div class="mb-3">
              <label for="imageInput" class="form-label">Editar Imagem do Membro</label>
              <div class="input-group">
                <input type="file" class="form-control" id="imageInput" accept="image/*">
                <button class="btn btn-outline-secondary" type="button" id="editButton">
                  <i class="bi bi-pencil"></i> <!-- Ícone de editar -->
                </button>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="productName" class="form-label">Editar Nome do Membro</label>
                <input type="text" class="form-control" id="productName">
              </div>
              <div class="col">
                <label for="membroCargo" class="form-label">Editar Cargo do Membro</label>
                <input type="text" class="form-control" id="membroCargo">
              </div>
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




  <!-- incio do modal E BOTAO QUE ABRE ELE -->
  <button type="button" class="btn btn-primary add" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-plus-circle-fill"></i> <!-- Ícone de adição -->
  </button>

  <!-- Modal de ADICIONAR MEMBRO -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Membro</h1>
          <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="imageInput" class="form-label">Imagem do Membro</label>
              <div class="input-group">
                <input type="file" class="form-control" id="imageInput" accept="image/*">
                <button class="btn btn-outline-secondary" type="button" id="editButton">
                  <i class="bi bi-pencil"></i> <!-- Ícone de editar -->
                </button>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="nm_membro" class="form-label">Nome do Membro</label>
                <input type="text" class="form-control" id="nm_membro">
              </div>
              <div class="col">
                <label for="ds_cargo" class="form-label">Cargo do Membro</label>
                <input type="text" class="form-control" id="ds_cargo">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="salvar_novo" class="btn btn-roxo" onclick="window.location.reload()">Salvar</button>
          <button type="button" class="btn btn-azul" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- fim do modal -->
  <!-- js -->
  <script src="js/duvidas.js"></script>
  <script src="js/menu.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php
    }
?>