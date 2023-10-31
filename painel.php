<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/painel.css">

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
  <title>Painel de Saúde</title>
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
    <!-- FIM DO MENU -->
  </section>
  <main>
    <div class="painel">
      <div class="painel-title">
        <h1>Painel de Saúde</h1>
        <p>Seja bem-vindo ao Painel de Saúde! Aqui você visualiza sua saúde de forma prática e organizada. Acompanhe
          seus dados pessoais, histórico e médico. Cuide-se melhor com nossa plataforma intuitiva e confiável.</p>
      </div>
    </div>
    <div class="painel-group">
      <!-- inicio card -->
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>ansiedade</P>
          </div>
        </div>
      </div>
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>depressão</P>
          </div>
        </div>
      </div>
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>suína</P>
          </div>
        </div>
      </div>
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>asma</P>
          </div>
        </div>
      </div>
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>autismo</P>
          </div>
        </div>
      </div>
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>dislexia</P>
          </div>
        </div>
      </div>
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>diabetes</P>
          </div>
        </div>
      </div>
      <div class="painel-card">
        <img src="img/toma.png" alt="" class="card-img">
        <div class="card-info">
          <div class="card-text">
            <P>fobia social</P>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group name">
      <label for="outros">Outros:</label>
      <input type="text" id="outros" class="form-control" placeholder="Digite aqui">
      <div class="form-group check">
        <label for="semdoenca">Não possuo síndromes, transtornos ou doenças</label>
        <input type="checkbox" id="semdoenca" class="box" placeholder="Digite aqui">
      </div>

  </main>
  <div class="revealbtn">
    <a class="ent" href="#">ENVIAR</a>
  </div>
  <script src="js/duvidas.js"></script>
  <script src="js/menu.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>