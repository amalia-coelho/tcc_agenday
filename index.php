<?php
    session_start();
    if (!isset($_SESSION['email'])) {  
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/inicio.css">
	<link rel="stylesheet" href="css/login.css">

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

  	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

  	<script type="text/javascript">
  	$(document).ready(function(){
		$(".ent").click(function(){
			// declaração de variáveis
			var email = $("#email").val();
			var senha = $("#password").val();

			$.ajax({
			url: "php/script_login.php",
			type: "POST",
			data: "email="+email+"&senha="+senha,
			dataType: "html"

			}).done(function(resposta){
				$("#exibe").html(resposta);
			}).fail(function(jqXHR, textStatus ) {
				console.log("Request failed: " + textStatus);
			});
		});
  	});
  	</script>
	<!-- /js -->
	<title>Agenday</title>
</head>

<body>
  <!-- INICIO DA HOME!! -->
  <section class="home">
    <div class="navbar">
      <img class="logo" src="img/logo-projeto.png" alt="Logo">
      <nav>
        <ul>
          <li><a href="#">Início</a></li>
          <li><a href="#">Sobre nós</a></li>
           <li><a href="#entrar">Entrar</a></li>
          <li><a href="#">Cadastro</a></li>
        </ul>
      </nav>
    </div>

    <div class="content">
      <div class="titulo">
        <h1 class="h1">AGENDAY <br>
          <span>ORGANIZE SEU <span class="success">SUCESSO</span></span>
        </h1>
      </div>
      <p>Aqui você visualiza eventos, tarefas, comunicados e muito mais!</p>
      <div class="revealimg">
        <a class="btnn" href="#">Como Funciona?</a>
      </div>
    </div>
    <div class="home-img">
      <img src="img/elemento-inicial.png" alt="Figura Inicial" class="inicial-element">
    </div>
  </section>
  <!-- FIM DA HOME!! -->

  <!-- PARTE DO LOGIN!! -->

  <section class="entrar" id="entrar">
    <div class="login-container">
      <div class="login-content">
        <div class="titulo">
          <h1 class="h1"><label class="log-success">Entre</label> na sua
            <span class="resp"> Conta</span>
          </h1>
        </div>
        <!-- fim do titulo -->
        <!-- começa os input -->

        <div class="form-group name">
          <label for="username">Email</label>
          <input type="text" id="email" class="form-control" placeholder="Digite seu email">
        </div>

        <div class="form-group custom-spacing pass">
          <label for="password">Senha</label>
          <div class="input-group">
            <input type="password" id="password" class="form-control" placeholder="Digite sua senha">
            <button type="button" id="togglePassword" class="btn">
              <i class="bi bi-eye" id="eyeIcon"></i>
            </button>
          </div>
          <small><a href="forgot.html">Esqueceu sua senha?</a></small>
          <div id="exibe">

          </div>
        </div>

        <!-- fim dos input -->
        <div class="revealbtn">
          <a class="ent">ENTRAR</a>
          <a class="create" href="cadastro.html">Não tem uma conta? Criar</a>
        </div>
      </div>
      <div class="login-img">
        <img src="img/calendar-animate.svg" alt="Figura Inicial" class="login-element">
      </div>
    </div>
  </section>
  <!-- FIM DO LOGIN!! -->

  <!-- js -->
  <script src="js/home.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePasswordButton.addEventListener('click', () => {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
      }
    });
  </script>
  <script>
    ScrollReveal({
      reset: true,
      distance: '60px',
      duration: 1500,
      delay: 400
    });

    ScrollReveal().reveal('nav', {
      delay: 500,
      origin: 'top'
    });
    ScrollReveal().reveal('.logo', {
      delay: 500,
      origin: 'bottom'
    });
    ScrollReveal().reveal('.content .titulo', {
      delay: 500,
      origin: 'left'
    });
    ScrollReveal().reveal('.content p', {
      delay: 700,
      origin: 'left'
    });
    ScrollReveal().reveal('.revealimg, .btnn', {
      delay: 900,
      origin: 'left'
    });
    ScrollReveal().reveal('.home .inicial-element', {
      delay: 500,
      origin: 'right'
    });



    ScrollReveal().reveal('.login-content .titulo', {
      delay: 300,
      origin: 'right'
    });
    ScrollReveal().reveal('.name', {
      delay: 700,
      origin: 'left'
    });
    ScrollReveal().reveal('.pass', {
      delay: 900,
      origin: 'right'
    });
    ScrollReveal().reveal('.revealbtn .ent', {
      delay: 500,
      origin: 'left'
    });
    ScrollReveal().reveal('.revealbtn .create', {
      delay: 900,
      origin: 'bottom'
    });
    ScrollReveal().reveal('.login-element', {
      delay: 500,
      origin: 'top'
    });
  </script>
</body>
</html>
<?php 
    }else{
        header('Location: comunicados.php');
    }
?>
