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
        <link rel="stylesheet" href="css/cadastro.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- /css -->

    <!-- js --> 
        <script src="https://unpkg.com/scrollreveal"></script>
        <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $(".ent").click(function(){
                // declaração de variáveis
                var email = $("#email").val();
                var senha = $("#password").val();

                $.ajax({
                url: "php/script_cadastro.php",
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
    <title>Cadastrar-se</title>
</head>

<body>
    <!-- PARTE DO LOGIN!! -->

    <section class="cadastro" id="cadastro">
        <div class="cadastro-container">
            <div class="titulo">
                <h1 class="h1">Cadastro
                </h1>
            </div>
            <div class="cadastro-content">
                <!-- fim do titulo -->
                <!-- começa os input -->

                <div class="form-group name">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" placeholder="Digite seu melhor email">
                </div>
                <div class="form-group name">
                    <input type="text" id="email2" class="form-control" placeholder="Confirme seu email">
                </div>

                <div class="form-group custom-spacing pass">
                    <label for="password">Senha</label>
                    <div class="input-group">
                        <input type="password" id="password" class="form-control" placeholder="Digite sua melhor senha">
                        <button type="button" id="togglePassword" class="btn">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password2" class="form-control" placeholder="Confirme sua senha">
                    </div>
                </div>

                <!-- fim dos input -->
                <div class="revealbtn">
                    <a class="ent">Criar Conta</a>
                    <a class="create" href="index.php">Voltar</a>
                  </div>
                  <div id="exibe">
                      <!-- Exibe mensagem de retorno do script -->
                  </div>
            </div>
            <div class="cadastro-img2">
                <img src="img/mobile-login-animate.svg" alt="Figura Inicial" class="cadastro-element2">
            </div>
            <div class="cadastro-img">
                <img src="img/create-animate.svg" alt="Figura Inicial" class="cadastro-element">
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
    ScrollReveal().reveal('.cadastro-container, .h1', {
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
    ScrollReveal().reveal('.revealbtn', {
      delay: 500,
      origin: 'left'
    });
    ScrollReveal().reveal('.revealbtn .create', {
      delay: 900,
      origin: 'bottom'
    });
    ScrollReveal().reveal('.cadastro-img', {
      delay: 500,
      origin: 'top'
    });
    ScrollReveal().reveal('.cadastro-img2', {
      delay: 500,
      origin: 'bottom'
    });
        </script>
    </body>
</html>
<?php 
    }else{
        header('Location: comunicados.php');
    }
?>
