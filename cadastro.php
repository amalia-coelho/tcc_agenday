<?php
    include("php/conexao.php");
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css"
        integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- /css -->
    <!-- js -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
    <script src="js/jquery.maskMoney.min.js"></script>
      	<script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $(".spinner-border").hide();
            $("#entrar").click(function () {
                // declaração de variáveis
                var nome = $("#nome").val();
                var email = $("#email").val();
                var senha = $("#senha").val();
                var confirmacao = $("#senhaConfirmacao").val();
                var rm = $("#rm").val();
                var turma = $("#turma").val();

                $.ajax({
                    url: "php/script_cadastro.php",
                    type: "POST",
                    data: "nome=" + nome + "&email=" + email + "&senha=" + senha + "&rm=" + rm +
                        "&turma=" + turma +"&confirmacao="+confirmacao,
                    dataType: "html"

                }).done(function (resposta) {
                    $("#exibe").html(resposta);
                }).fail(function (jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });
            });
            $("#email").on("input", function () {
                var email = $(this).val();
                var isValid = validarEmail(email);

                if (isValid) {
                    // O e-mail é válido, você pode realizar ações apropriadas aqui
                    console.log("E-mail válido");
                    removeError(2);


                } else {
                    // O e-mail não é válido, você pode mostrar uma mensagem de erro ou realizar outras ações
                    console.log("E-mail inválido");
                    setError(2);

                }
            });

            function validarEmail(email) {
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
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
                <h1 class="h1">Cadastro</h1>
            </div>
            <div class="cadastro-content">
                <!-- fim do titulo -->
                <!-- começa os input -->
                <div class="form-group name mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="form-control required" placeholder="Ex: Diógenes Pereira"
                        required oninput="nameValidate()">
                    <span class="span-required">Nome deve ter no minímo 3 caracteres</span>
                </div>
                <div class="row mt-4">
                    <div class="input-group col">
                        <label for="RM"></label>
                        <input maxlength="5" placeholder="Digite seu RM" style="height: 2rem !important;"
                            class="form-control required" oninput="RmValidate()" type="number" id="rm" required
                            data-mask="00000">
                        <span class="span-required">O RM deve possuir no minímo 3 Caracteres</span>

                    </div>
                    <div class="input-group col">
                        <select class="form-select" id="turma" aria-label="Default select example">
                            <option selected>Qual seu Curso?</option>
                            <?php
                                $option = "";
                                $sql = "SELECT * FROM tb_turma";

                                foreach ($conn->query($sql) as $turma){
                                    $option .= "<option value='".$turma['cd_turma']."'>".$turma['nm_turma']."</option>";
                                }
                                echo $option;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group name mt-2">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control required" oninput="emailValidate()"
                        placeholder="Digite seu melhor email">
                    <span class="span-required">Insira um Email válido</span>

                </div>
                <div class="form-group custom-spacing pass">
                    <label for="senha">Senha</label>
                    <div class="input-group">
                        <input type="password" id="senha" class="form-control required" oninput="mainPasswordValidate()"
                            placeholder="Digite sua melhor senha">
                        <button type="button" id="togglePassword" class="btn">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>

                    </div>
                    <span class="span-required">Senha de no mínimo 8 Caracteres</span>
                    <div class="input-group">
                        <input type="password" id="senhaConfirmacao" required class="form-control required"
                            oninput="comparePassword()" placeholder="Confirme sua senha">

                    </div>
                    <span class="span-required">As Senhas devem ser compatíveis</span>
                </div>
                            
                <!-- fim dos input -->
                <div id="exibe">
                    <!-- Exibe mensagem de retorno do script -->
                </div>
                <div class="revealbtn">
                    <a class="ent" href="#" id="entrar">Criar Conta</a>
                    <div class="spinner-border mt-5" role="status">
            </div>
                    <a class="create" href="index.php">Voltar</a>
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



    <!-- Footer -->
    <footer>
        <div class="footer-items">
            <div class="footer-img logo">
                <img src="img/logo-branca.png" alt="Logo">
            </div>
            <div class="footer-titles">
                <p class="title-footer">Início</p>
                <p>Perfil</p>
                <p>Histórico</p>
            </div>
            <div class="footer-titles">
                <p class="title-footer">Início</p>
                <p>Perfil</p>
                <p>Histórico</p>
            </div>
            <div class="footer-titles">
                <p class="title-footer">Início</p>
                <p>Perfil</p>
                <p>Histórico</p>
            </div>
            <div class="footer-titles">
                <p class="title-footer">Sobre-nós</p>
                <p><i class="bi bi-envelope-at-fill"></i> valorun.tcc@gmail.com</p>
                <p><i class="bi bi-whatsapp"></i> (13) 4002-8922</p>
            </div>
            <div class="footer-social">
                <div class="social-medias">
                    <img src="img/insta.png" alt="Social">
                    <img src="img/twitter.png" alt="Social">
                    <img src="img/tiktok.png" alt="Social">
                </div>
                <a href="#">CONTATO</a>
            </div>
        </div>
        <div class="footer-img logo2">
            <img src="img/Logo DO V.png" alt="Logo">
        </div>
        <div class="copy">
            <i class="bi bi-c-circle"></i> 2023 Valorun | Todos os Direitos Reservados
        </div>
    </footer>
    <!-- Fim do Footer -->

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>


        const passwordInput = document.getElementById('senha');
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
    <!-- js -->
    <script src="js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
    <script src="js/cadastro.js"></script>
</body>

</html>
<?php 
    }else{
        header('Location: calendario.php');
    }
?>