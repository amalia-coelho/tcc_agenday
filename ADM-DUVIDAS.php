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
        <li class="item-menu">
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
        <li class="item-menu ativo">
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

  <!-- imagem -->


  <div class="duvidas">
    <h1> Dúvidas Frequentes</h1>
  </div>
  <div class="faq">
    <button class="faq-toggle">
      Como adicionar um evento no calendário?
      <span class="arrow"></span>
    </button>
    <div class="faq-content">
      <ol>Para adicionar um evento, siga esses passos simples:

        <li>Clique no ícone de casa no menu lateral da tela.</li>
        <li>Localize e clique na data desejada de adição</li>
        <li>Escolha e descreva os dados correspondentes ao evento</li>
        <li>Salve clicando no botão "Salvar" </li>
        <li>Verifique se o evento aparece corretamente no calendário.</li>

        Pronto! Agora você adicionou um evento com facilidade!
      </ol>
    </div>
  </div>
  <div class="faq">
    <button class="faq-toggle">
      Como adicionar um comunicado?
      <span class="arrow"></span>
    </button>
    <div class="faq-content">
      <ol>Para adicionar um comunicado, siga esses passos simples:

        <li>Clique no ícone de mega fone no menu lateral da tela.</li>
        <li>Localize e clique no ícone de "+" para poder habilitar a adição</li>
        <li>Escolha uma foto e dados do comunicado.</li>
        <li>Salve clicando no botão "Salvar" </li>
        <li>Verifique se o novo comunicado aparece corretamente na página.</li>

        Pronto! Agora você adicionou um comunicado com facilidade!
      </ol>
    </div>
  </div>
  <div class="faq">
    <button class="faq-toggle">
      Como fazer realizar cadastro por lote?
      <span class="arrow"></span>
    </button>
    <div class="faq-content">
      <ol>Para cadastrar novos alunos, siga esses passos simples:

        <li>Clique no ícone de engrenagem no menu lateral da tela.</li>
        <li>Localize e clique no botão "cadastro por lote" para poder adicionar</li>
        <li>Escolha o arquivo desejado.</li>
        <li>Salve clicando no botão "Salvar" </li>
        <li>Verifique se os usuários aparecem corretamente na aba de gerenciamento.</li>

        Pronto! Agora você realizou um cadastro por lote com facilidade!
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