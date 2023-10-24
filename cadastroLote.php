<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
        <link rel="stylesheet" href="css/style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- /css -->

    <!-- js --> 
        <script src="https://unpkg.com/scrollreveal"></script>
        <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#botaoEnviar').hide();
            //ENVIAR CSV
			$('#add_usuarios').submit(function (e) {
				e.preventDefault();

				var formulario = new FormData(this); // Crie um objeto FormData com os dados do formulário
				$.ajax({
					type: 'POST',
					url: 'php/ler_novosAlunos.php',
					data: formulario,
					contentType: false,
					processData: false,
				}).done(function(tabela){					
					$("#exibe").html(tabela);
                    $('#botaoEnviar').show();
				}).fail(function(jqXHR, textStatus ) {
					console.log("Request failed: " + textStatus);
				});
			});

            $('#enviarUsuarios').click(function() {
                var usuarios = [];
                $('#tabelaUsuarios tbody tr').each(function() {
                    var rm = $(this).find('.rm').text();
                    var nome = $(this).find('.nome').text();
                    var email = $(this).find('.email').text();

                    var user = {
                        rm: rm,
                        nome: nome,
                        email: email
                    };

                    usuarios.push(user);
                });

                $.ajax({
                    type: 'POST',
                    url: 'php/cadastrar_lote.php',
                    data: { usuarios: usuarios },
                }).done(function(resposta){					
                    $("#resposta").html(resposta);
                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
                });
            });
        });
        </script>
    <!-- /js -->
    <title>Cadastrar usuários</title>
</head>
<body>
    <h1>Cadastro de novos alunos</h1>
    <form id="add_usuarios" enctype="multipart/form-data">
        <input type="file" class="default-file-input" name="registro_alunos" id="registro_alunos" accept=".csv">
        <button type="submit">Enviar</button>
    </form>
    <div id="exibe">
        
    </div>
    <div id="botaoEnviar">
        <button type="button" id="enviarUsuarios">Cadastrar</button>
    </div>
    <div id="resposta">

    </div>
</body>
</html>