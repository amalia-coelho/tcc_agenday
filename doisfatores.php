<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/doisfatores.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- /css -->

  <!-- js -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#oculto").hide();
      $("#verifica").click(function(){
			// declaração de variáveis
			var codigo = $("#cod1").val()+$("#cod2").val()+$("#cod3").val()+$("#cod4").val()+$("#cod5").val();

			$.ajax({
			url: "php/verifica_codigo.php",
			type: "POST",
			data: {codigo},
			dataType: "html"

			}).done(function(resposta){
				$("#exibe").html(resposta);
        $("#abrirModal").click();
			}).fail(function(jqXHR, textStatus ) {
				console.log("Request failed: " + textStatus);
			});
		});

    $("#enviar").click(function(){
      var novaSenha = $("#novasenha").val();
      var confirmacao = $("#password").val();
      $.ajax({
			url: "php/alterar_senha.php",
			type: "POST",
      data: {senhaNova: novaSenha, confirmarSenha: confirmacao, permissaoAlterar: true},
			dataType: "html"
			}).done(function(resposta){
				$("#exibe_cadastro").html(resposta);
        $("#fechar").click();
			}).fail(function(jqXHR, textStatus ) {
				console.log("Request failed: " + textStatus);
			});
    });
    });
  </script>
  <!-- /js -->
  <title>Atualizar Senha</title>
</head>

<body>
  <!-- INICIO DA HOME!! -->
  <section class="home">

    <!-- PARTE DA SENHA!! -->

    <section class="entrar" id="entrar">
      <div class="login-container">
        <div class="login-content">
          <div class="titulo">
            <h1 class="h1"><label class="log-success">Atualize </label> a<br>
              <span class="resp">Sua Senha</span>
            </h1>
            <small><a href="#">Verifique seu e-mail e abaixo digite o código de verificação que foi enviado no
                mesmo</a></small>
          </div>
          <!-- fim do titulo -->
          <!-- começa os input -->



          <div class="form-group custom-spacing pass inputs-container">
            <input type="number" class="form-control text-center" id="cod1" min="0" max="9" required autofocus>
            <input type="number" class="form-control text-center" id="cod2" min="0" max="9" required>
            <input type="number" class="form-control text-center" id="cod3" min="0" max="9" required>
            <input type="number" class="form-control text-center" id="cod4" min="0" max="9" required>
            <input type="number" class="form-control text-center" id="cod5" min="0" max="9" required>
          </div>
          <small class="cod"><a href="forgot.php">Reenviar Código</a></small>


          <!-- fim dos input -->
          <div class="revealbtn">
            <button class="ent" id="verifica">Verificar</button>
            <a class="create" href="forgot.php">Voltar</a>
          </div>
          <div id="oculto">
          <button id="abrirModal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Abrir modal</button>
          <div id="exibe"></div>
          </div>
        </div>
        <div class="login-img">
          <img src="img/authentication-animate.svg" alt="Figura Inicial" class="login-element">
        </div>
      </div>
      <!-- incio do modal -->
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Esqueci Minha Senha</h1>
              <button type="button" class="btn-close close-button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3 mod-senha" >
                  <label for="novasenha" class="form-label">Nova Senha</label>
                  <input type="password" class="form-control" placeholder="Insira Sua Nova Senha" id="novasenha">
                </div>
                <div class="input-group mod-senha">
                  <input type="password" id="password" class="form-control" placeholder="Confirme Sua Senha">
                  <button type="button" id="togglePassword" class="btn">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                  </button>
                </div>

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-roxo" id="enviar">Salvar</button>
              <button type="button" class="btn btn-azul" data-bs-dismiss="modal" id="fechar">Fechar</button>
            </div>
            <div id="exibe_cadastro"></div>
          </div>
        </div>
      </div>
      <!-- fim do modal -->
    </section>
    <!-- FIM DA SENHA!! -->
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
      ScrollReveal().reveal('.login-content .titulo', {
        delay: 500,
        origin: 'left'
      });
      ScrollReveal().reveal('.login-content p', {
        delay: 700,
        origin: 'left'
      });
      ScrollReveal().reveal('.revealimg, .btnn', {
        delay: 900,
        origin: 'left'
      });
      // ScrollReveal().reveal('.login-img, .login-element', {
      //   delay: 500,
      //   origin: 'right'
      // });



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
      // ScrollReveal().reveal('.login-element', {
      //   delay: 500,
      //   origin: 'top'
      // });
    </script>
    <script src="js/focus-input.js"></script>
</body>
</html>