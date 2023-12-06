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
	<link rel="stylesheet" href="css/equipe.css">

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
      $(".spinner-border").hide();

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
          <li><a href="#entrar2">Sobre nós</a></li>
           <li><a href="#entrar">Entrar</a></li>
          <li><a href="cadastro.php">Cadastro</a></li>
        </ul>
      </nav>
    </div>

    <div class="content">
      <div class="titulo" id="titulo">
        <h1 class="h1">AGENDAY <br>
          <span>ORGANIZE SEU <span class="success">SUCESSO</span></span>
        </h1>
      </div>
      <p>Aqui você visualiza eventos, tarefas, comunicados e muito mais!</p>
      <div class="revealimg">
        <a class="btnn" href="#entrar2">Conheça a Equipe!</a>
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
            <input type="password" id="password" class="form-control" required placeholder="Digite sua senha">
            <button type="button" id="togglePassword" class="btn">
              <i class="bi bi-eye" id="eyeIcon"></i>
            </button>
          </div>
          <small><a href="forgot.php">Esqueceu sua senha?</a></small>
        </div>
        <div id="exibe">

        </div>

        <!-- fim dos input -->
        <div class="revealbtn">
          <a class="ent">ENTRAR
            </a>
            <div class="spinner-border mt-5" role="status">
            </div>
          <a class="create" href="cadastro.php">Não tem uma conta? Criar</a>
        </div>
      </div>
      <div class="login-img">
        <img src="img/calendar-animate.svg" alt="Figura Inicial" class="login-element">
      </div>
    </div>
  </section>
  <!-- FIM DO LOGIN!! -->
   <!-- PARTE DA EQUIPE!! -->

   <section class="equipe1" id="entrar2">
    <div class="row" id="equipe">
        <h1 class="equipe-title">Conheça Nossa Equipe</h1>
      </div>
    <div class="equipe-container">
       <!-- Column 1-->
       <div class="column" id="card-equipe1">
          <div class="card">
            <div class="img-container">
              <img src="img/mikaella.png" />
            </div>
            <h3 style="font-size: 1.70rem">Mikaella Macedo</h3>
            <p>Analista</p>
            <div class="icons">
              <a href="#">
                <i class="bi bi-twitter"></i>
              </a>
              <a href="#">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="#">
                <i class="bi bi-github"></i>
              </a>
              <a href="#">
                <i class="bi bi-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 2-->
        <div class="column" id="card-equipe2">
          <div class="card">
            <div class="img-container">
              <img src="img/amalia.png" />
            </div>
            <h3>Amália Coelho</h3>
            <p>Back-End</p>
            <div class="icons">
              <a href="#">
                <i class="bi bi-twitter"></i>
              </a>
              <a href="https://www.linkedin.com/in/amalia-coelho">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="https://github.com/amalia-coelho">
                <i class="bi bi-github"></i>
              </a>
              <a href="https://www.instagram.com/coelho_yaq/">
                <i class="bi bi-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 3-->
        <div class="column" id="card-equipe3">
          <div class="card">
            <div class="img-container">
              <img src="img/equipe-eric.jpg" />
            </div>
            <h3>Eric Junokas</h3>
            <p>Front-End</p>
            <div class="icons">
              <a href="#">
                <i class="bi bi-twitter"></i>
              </a>
              <a href="https://www.linkedin.com/in/eric-junokas-393080228/" >
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="https://github.com/ericofff">
                <i class="bi bi-github"></i>
              </a>
              <a href="https://www.instagram.com/ericjunokas/">
                <i class="bi bi-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 4-->
        <div class="column" id="card-equipe4">
          <div class="card">
            <div class="img-container">
              <img src="img/equipe-iago.jpeg" />
            </div>
            <h3>Iago Marques</h3>
            <p>Front-End</p>
            <div class="icons">
              <a href="#">
                <i class="bi bi-twitter"></i>
              </a>
              <a href="https://www.linkedin.com/in/iago-marques-5140a2280/">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="https://github.com/IagoXx12">
                <i class="bi bi-github"></i>
              </a>
              <a href="https://www.instagram.com/iago_marques71/">
                <i class="bi bi-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Column 5-->
        <div class="column" id="card-equipe5">
          <div class="card">
            <div class="img-container">
              <img src="img/raissa.png" />
            </div>
            <h3>Raissa Berto</h3>
            <p>Back-End</p>
            <div class="icons">
              <a href="#">
                <i class="bi bi-twitter"></i>
              </a>
              <a href="#">
                <i class="bi bi-linkedin"></i>
              </a>
              <a href="#">
                <i class="bi bi-github"></i>
              </a>
              <a href="https://www.instagram.com/raissa_bertto/">
                <i class="bi bi-instagram"></i>
              </a>
            </div>
          </div>
        </div>
    </div>
  </section>
  <!-- FIM DA EQUIPE!! -->
 
<!-- footer -->
<?php

include('footer.php');
?>

<!-- fim do footer -->

  <!-- js -->
  <script src="js/home.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>

document.addEventListener('DOMContentLoaded', function () {
  var entrar2Section = document.getElementById('entrar2');
var links = entrar2Section.querySelectorAll('a');

links.forEach(function (link) {
    link.setAttribute('target', '_blank');
});
        });  
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

    // EQUIPE
    ScrollReveal().reveal('.equipe1 .equipe-title', {
      delay: 300,
      origin: 'right'
    });
    ScrollReveal().reveal('#card-equipe1', {
      delay: 700,
      origin: 'bottom'
    });
    ScrollReveal().reveal('#card-equipe2', {
      delay: 850,
      origin: 'bottom'
    });
    ScrollReveal().reveal('#card-equipe3', {
      delay: 1000,
      origin: 'bottom'
    });
    ScrollReveal().reveal('#card-equipe4', {
      delay: 1150,
      origin: 'bottom'
    });
    ScrollReveal().reveal('#card-equipe5', {
      delay: 1300,
      origin: 'bottom'
    });

    ScrollReveal().reveal('#card-equipe1 .img-container', {
      delay: 1300,
      origin: 'top'
    });
    ScrollReveal().reveal('#card-equipe2 .img-container', {
      delay: 1400,
      origin: 'top'
    });
    ScrollReveal().reveal('#card-equipe3 .img-container', {
      delay: 1500,
      origin: 'top'
    });
    ScrollReveal().reveal('#card-equipe4 .img-container', {
      delay: 1600,
      origin: 'top'
    });
    ScrollReveal().reveal('#card-equipe5 .img-container', {
      delay: 1700,
      origin: 'top'
    });


    
    ScrollReveal().reveal('.pass', {
      delay: 900,
      origin: 'right'
    });
   
  </script>
</body>
</html>
<?php 
    }else{
        header('Location: calendario.php');
    }
?>
