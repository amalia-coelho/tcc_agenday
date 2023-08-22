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
  <link rel="stylesheet" href="css/comunicado.css">
  <link rel="stylesheet" href="css/menu.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <!-- /css -->

  <!-- js -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>

  </script>
  <!-- /js -->
  <title>Dúvidas</title>
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
      <h1>Comunicados</h1>
    </div>
    <section class="comunicado horizontal">
      <div class="comunicado-image">
        <img src="img/foto.webp" alt="Comunicado Importante">
      </div>
      <div class="comunicado-content">
        <div class="comunicado-header">
          <h2>Comunicado Importante</h2>
          <p class="date">Publicado em: 7 de Agosto de 2023</p>
        </div>
        <p class="comunicado-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum ligula sit
          amet nulla efficitur, at condimentum urna facilisis.</p>
      </div>

    </section>
    <section class="comunicado horizontal mt-5">
      <div class="comunicado-image">
        <img src="img/foto.webp" alt="Comunicado Importante">
      </div>
      <div class="comunicado-content">
        <div class="comunicado-header">
          <h2>Comunicado Importante</h2>
          <p class="date">Publicado em: 7 de Agosto de 2023</p>
        </div>
        <p class="comunicado-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum ligula sit
          amet nulla efficitur, at condimentum urna facilisis.</p>
      </div>

    </section>
    <section class="comunicado horizontal mt-5">
      <div class="comunicado-image">
        <img src="img/foto.webp" alt="Comunicado Importante">
      </div>
      <div class="comunicado-content">
        <div class="comunicado-header">
          <h2>Comunicado Importante</h2>
          <p class="date">Publicado em: 7 de Agosto de 2023</p>
        </div>
        <p class="comunicado-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum ligula sit
          amet nulla efficitur, at condimentum urna facilisis. lorem50</p>
      </div>

    </section>

    <div class="comunicado-img">
      <img src="img/ecotourism-animate.svg" alt="Figura Inicial" class="comunicado-element">
    </div>

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
<?php
    }
?>
