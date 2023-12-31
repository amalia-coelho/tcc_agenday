<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reset.css">

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
  <title>Esqueceu a Senha</title>
</head>

<body>
  <!-- PARTE DO LOGIN!! -->

  <section class="entrar">
    <div class="login-container">
      <div class="login-content">
        <div class="titulo">
          <h1 class="h1"><label class="fog-success">Insira</label> sua <br>
            Nova Senha
          </h1>
          <small><a href="#">Para redefinir sua senha, digite ela no campo <br class="resp"> abaixo</a></small>
        </div>
        <!-- fim do titulo -->
        <!-- começa os input -->

        <div class="form-group custom-spacing name">
          <input type="text" id="username" class="form-control" placeholder="Digite sua nova senha">
        </div>
        <div class="form-group custom-spacing name">
          <input type="text" id="username" class="form-control" placeholder="Confirme sua senha">
        </div>
        <!-- fim dos input -->
        <div class="revealbtn">
          <div>
            <a class="ent" href="doisfatores.php">Atualizar Senha</a>
          </div>
          <div>
            <a class="create" href="index.php">Voltar</a>
          </div>
        </div>

      </div>
      <div class="login-img">
        <img src="img/reset-password-animate.svg" alt="Figura Inicial" class="login-element">
      </div>
    </div>
  </section>
  <!-- FIM DO LOGIN!! -->
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