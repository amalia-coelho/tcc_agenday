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
  <script>

  </script>
  <!-- /js -->
  <title>Comunicado</title>
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
          <a href="#">
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
      </ul>
    </nav>
    <!-- FIM DO MENU -->
  </section>
  <main>
    <div class="comuni">
      <h1>Gestão</h1>
    </div>
    <section class="gestao">
      <div class="gestao-container">
        <div class="gestao-users">
          <img src="img/OIP.jpg" alt="Foto do Usuário">
          <p>Felipe Da Academia</p>
          <p>Instrutor</p>
        </div>
        <div class="gestao-users">
          <img src="img/OIP.jpg" alt="Foto do Usuário">
          <p>Felipe Da Academia</p>
          <p>Instrutor</p>
        </div>
        <div class="gestao-users">
          <img src="img/OIP.jpg" alt="Foto do Usuário">
          <p>Felipe Da Academia</p>
          <p>Instrutor</p>
        </div>
        <div class="gestao-users">
          <img src="img/OIP.jpg" alt="Foto do Usuário">
          <p>Felipe Da Academia</p>
          <p>Instrutor</p>
        </div>
        <div class="gestao-users">
          <img src="img/OIP.jpg" alt="Foto do Usuário">
          <p>Felipe Da Academia</p>
          <p>Instrutor</p>
        </div>
      </div>


      <!-- incio do modal -->
      <button type="button" class="btn btn-primary add" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-plus-circle-fill"></i> <!-- Ícone de adição -->
      </button>

      <!-- Modal -->
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
                  <label for="imageInput" class="form-label">Foto Da Pessoa</label>
                  <div class="input-group">
                    <input type="file" class="form-control" id="imageInput" accept="image/*">
                    <button class="btn btn-outline-secondary" type="button" id="editButton">
                      <i class="bi bi-pencil"></i> <!-- Ícone de editar -->
                    </button>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="nameCompleto" class="form-label">Nome Completo</label>
                  <input type="text" class="form-control" id="nameCompleto">
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="productOptions" class="form-label">Cargo</label>
                    <select multiple class="form-select" id="productOptions">
                      <option value="3min">Grêmio</option>
                      <option value="3mad">Gestão</option>
                      <option value="3mam">Apm</option>
                    </select>
                  </div>
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
  </main>
  <!-- js -->
  <script src="js/duvidas.js"></script>
  <script src="js/menu.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>