<?php
    session_start();
    
    if($_SESSION['permissaoAlterar'] == "True"){
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $("#cadastrar").click(function(){
                var senhaNova = $("#novaSenha").val();
                var confirmarSenha = $("#confirmarSenha").val();

                $.ajax({
                    url: "php/alterar_senha.php",
			        type: "POST",
			        data: "senhaNova="+senhaNova+"&confirmarSenha="+confirmarSenha,
			        dataType: "html"    
                }).done(function(resposta){
			    	$("#exibe").html(resposta);
                }).fail(function(jqXHR, textStatus ) {
				    console.log("Request failed: " + textStatus);
			    });
            });
        });
    </script>
    <title>Alterar senha</title>
</head>
<body>
    <p>Senha nova:<input type="text" id="novaSenha"></p>
    <p>Confirma senha: <input type="text" id="confirmarSenha"></p>
    <button id="cadastrar">Alterar</button>
    <div id="exibe"></div>
</body>
</html>
<?php
    }else{
        header("Location: forgot.php");
    }
?>