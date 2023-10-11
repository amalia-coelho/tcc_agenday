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
  <link rel="stylesheet" href="css/duvidas.css">
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
				<a href="perfil.php">
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
    <!-- FIM DO MENU -->
  </section>

  <!-- imagem -->


  <div class="duvidas">
    <h1> Dúvidas Frequentes</h1>
  </div>
  <div class="faq">
    <button class="faq-toggle">
      Como posso mudar a minha foto de perfil?
      <span class="arrow"></span>
    </button>
    <div class="faq-content">
      <ol>Para mudar sua foto de perfil, siga esses passos simples:

        <li>Clique no ícone de usuário no menu lateral da tela;</li>
        <li>Localize e clique no ícone de lápis para poder habilitar a edição;</li>
        <li>Escolha uma nova foto do seu dispositivo e carregue-a;</li>
        <li>Salve suas alterações clicando no botão "Salvar";</li>
        <li>Verifique se a nova foto aparece corretamente no seu perfil.</li>

        Pronto! Agora você personalizou sua foto de perfil com facilidade!
      </ol>
    </div>
  </div>
  <div class="faq">
    <button class="faq-toggle">
      Como visualizar um evento no calendário?
      <span class="arrow"></span>
    </button>
    <div class="faq-content">
      <ol>Para vizualizar um evento, siga esses passos simples:

        <li>Clique no ícone de casa no menu lateral da tela;</li>
        <li>Localize e clique na data em que deseja visualizar;</li>
        <li>Escolha uma nova foto do seu dispositivo e carregue-a.</li>
        Pronto! Agora você visualizar o evento com facilidade!
      </ol>
    </div>
  </div>
  <div class="faq">
    <button class="faq-toggle">
      Como cadastrar uma nova síndrome?
      <span class="arrow"></span>
    </button>
    <div class="faq-content">
      <ol>Para adicionar uma síndrome, siga esses passos simples:

        <li>Clique no ícone de usuário no menu lateral da tela.</li>
        <li>Localize e clique no ícone de síndromes ou soenças;</li>
        <li>Será aberto um campo para modificação e adição;</li>
        <li>Após alterar apenas salve.</li>

        Pronto! Agora você Atualizou seus dados com facilidade!
      </ol>
    </div>
  </div>



  <!-- FIM DA DÚVIDA!! -->
  <div class="mensagem2-img">
    <img src="img/mensagem2.svg" alt="Figura Inicial" class="mensagem2-element">
  </div>
  <div class="mensagem-img">
    <img src="img/mensagem.svg" alt="Figura Inicial" class="mensagem-element">
  </div>
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