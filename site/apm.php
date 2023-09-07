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
  <link rel="stylesheet" href="css/apm.css">
  <link rel="stylesheet" href="css/menu.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
    integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- /css -->

  <!-- js -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>

  </script>
  <!-- /js -->
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
        <li class="item-menu ativo">
          <a href="#">
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
          <a href="gestão.html">
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
      </ul>
    </nav>
    <!-- FIM DO MENU -->

    <?php
          echo $_SESSION['email'];
        ?>
    <div class="apm">
      <div class="apm-title">
        <h1>APM</h1>
        <p>Olá, aqui é a APM (Associação de Pais e Mestres)! Nessa área é possível somente visualizar todos os itens que
          são vendidos na nossa escola, caso você queira adquirir alguma coisa, terá que se redirecionar para a
          secretária da Etec de Itanhaém.</p>
      </div>
      <div class="apm-card-container">

        <!-- carousel -->
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <!-- conteudo -->
              <div class="apm-card">
                <img src="img/roupa.jpg" alt="" class="card-img">
                <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                    class="bi bi-pencil-square edit-icon"></i></button>
                <i class="bi bi-trash-fill delete-icon"></i>
                <div class="card-info">
                  <div class="card-text">
                    <p class="card-title">Camiseta </p>
                    <p class="card-sub">Informática para Internet</p>
                  </div>
                  <div class="price">
                    <a href="#" class="btn btn-secondary">R$50,00</a>
                  </div>
                </div>
              </div>
              <!-- fim do conteudo -->
            </div>
            <div class="carousel-item">
              <!-- conteudo -->
              <div class="apm-card">
                <img src="img/roupa.jpg" alt="" class="card-img">
                <div class="card-info">
                  <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                      class="bi bi-pencil-square edit-icon"></i></button>
                  <i class="bi bi-trash-fill delete-icon"></i>

                  <div class="card-text">
                    <p class="card-title">Camiseta </p>
                    <p class="card-sub">Informática para Internet</p>
                  </div>
                  <div class="price">
                    <a href="#" class="btn btn-secondary">R$50,00</a>
                  </div>
                </div>
              </div>
              <!-- fim do conteudo -->
            </div>
            <div class="carousel-item">
              <!-- conteudo -->
              <div class="apm-card">
                <img src="img/roupa.jpg" alt="" class="card-img">
                <div class="card-info">
                  <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                      class="bi bi-pencil-square edit-icon"></i></button>
                  <i class="bi bi-trash-fill delete-icon"></i>
                  <div class="card-text">
                    <p class="card-title">Camiseta </p>
                    <p class="card-sub">Informática para Internet</p>
                  </div>
                  <div class="price">
                    <a href="#" class="btn btn-secondary">R$50,00</a>
                  </div>
                </div>
              </div>
              <!-- fim do conteudo -->
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <i class="bi bi-caret-left"></i>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <i class="bi bi-caret-right"></i>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- fim do carousel -->

        <div class="apm-group">
          <!-- inicio card -->
          <div class="apm-card">
            <img src="img/roupa.jpg" alt="" class="card-img">
            <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                class="bi bi-pencil-square edit-icon"></i></button>
            <i class="bi bi-trash-fill delete-icon"></i>
            <div class="card-info">
              <div class="card-text">
                <p class="card-title">Camiseta </p>
                <p class="card-sub">Informática para Internet</p>
              </div>
              <div class="price">
                <a href="#" class="btn btn-secondary">R$50,00</a>
              </div>
            </div>
          </div>
          <!-- fim card -->
          <!-- inicio card -->
          <div class="apm-card">
            <img src="img/roupa.jpg" alt="" class="card-img">
            <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                class="bi bi-pencil-square edit-icon"></i></button>
            <i class="bi bi-trash-fill delete-icon"></i>
            <div class="card-info">
              <div class="card-text">
                <p class="card-title">Camiseta </p>
                <p class="card-sub">Informática para Internet</p>
              </div>
              <div class="price">
                <a href="#" class="btn btn-secondary">R$50,00</a>
              </div>
            </div>
          </div>
          <!-- fim card -->
          <!-- inicio card -->
          <div class="apm-card">
            <img src="img/roupa.jpg" alt="" class="card-img">
            <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                class="bi bi-pencil-square edit-icon"></i></button>
            <i class="bi bi-trash-fill delete-icon"></i>
            <div class="card-info">
              <div class="card-text">
                <p class="card-title">Camiseta </p>
                <p class="card-sub">Informática para Internet</p>
              </div>
              <div class="price">
                <a href="#" class="btn btn-secondary">R$50,00</a>
              </div>
            </div>
          </div>
          <!-- fim card -->
          <!-- inicio card -->
          <div class="apm-card">
            <img src="img/roupa.jpg" alt="" class="card-img">
            <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                class="bi bi-pencil-square edit-icon"></i></button>
            <i class="bi bi-trash-fill delete-icon"></i>
            <div class="card-info">
              <div class="card-text">
                <p class="card-title">Camiseta </p>
                <p class="card-sub">Informática para Internet</p>
              </div>
              <div class="price">
                <a href="#" class="btn btn-secondary">R$50,00</a>
              </div>
            </div>
          </div>
          <!-- fim card -->
          <!-- inicio card -->
          <div class="apm-card">
            <img src="img/roupa.jpg" alt="" class="card-img">
            <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                class="bi bi-pencil-square edit-icon"></i></button>
            <i class="bi bi-trash-fill delete-icon"></i>
            <div class="card-info">
              <div class="card-text">
                <p class="card-title">Camiseta </p>
                <p class="card-sub">Informática para Internet</p>
              </div>
              <div class="price">
                <a href="#" class="btn btn-secondary">R$50,00</a>
              </div>
            </div>
          </div>
          <!-- fim card -->
          <!-- inicio card -->
          <div class="apm-card">
            <img src="img/roupa.jpg" alt="" class="card-img">
            <button data-bs-toggle="modal" data-bs-target="#editModal"><i
                class="bi bi-pencil-square edit-icon"></i></button>
              <i class="bi bi-trash-fill delete-icon"></i>
            <div class="card-info">
              <div class="card-text">
                <p class="card-title">Camiseta </p>
                <p class="card-sub">Informática para Internet</p>
              </div>
              <div class="price">
                <a href="#" class="btn btn-secondary">R$50,00</a>
              </div>
            </div>
          </div>
          <!-- fim card -->



        </div>
      </div>
    </div>


    <!-- Modal de Alteração -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editModalLabel">Editar Produto</h1>
            <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <!-- Inputs para a alteração -->
              <div class="mb-3">
                <label for="newProductName" class="form-label">Novo Nome do Produto</label>
                <input type="text" class="form-control" id="newProductName">
              </div>
              <div class="mb-3">
                <label for="newProductValue" class="form-label">Novo Valor do Produto</label>
                <input type="text" class="form-control" id="newProductValue">
              </div>
              <div class="mb-3">
                <label for="newProductDescription" class="form-label">Nova Descrição do Produto</label>
                <textarea class="form-control" id="newProductDescription" rows="4"></textarea>
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

    <!-- Modal de ADICIONAR APM -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Produto</h1>
            <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="imageInput" class="form-label">Imagem do Produto</label>
                <div class="input-group">
                  <input type="file" class="form-control" id="imageInput" accept="image/*">
                  <button class="btn btn-outline-secondary" type="button" id="editButton">
                    <i class="bi bi-pencil"></i> <!-- Ícone de editar -->
                  </button>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label for="productName" class="form-label">Nome do Produto</label>
                  <input type="text" class="form-control" id="productName">
                </div>
                <div class="col">
                  <label for="productValue" class="form-label">Valor do Produto</label>
                  <input type="text" class="form-control" id="productValue">
                </div>
              </div>
              <div class="mb-3">
                <label for="productDescription" class="form-label">Descrição do Produto</label>
                <textarea class="form-control" id="productDescription" rows="4"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-roxo">Salvar</button>
            <button type="button" class="btn btn-azul" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- fim do modal -->
  </section>

  <!-- FIM DA DÚVIDA!! -->

  <!-- js -->
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