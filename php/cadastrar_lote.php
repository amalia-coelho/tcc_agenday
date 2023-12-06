<?php
    session_start();
    include("conexao.php");

    function gerarCodigo($tamanho) {
        $caracteres = '0123456789';
        $codigo_verificacao = '';
    
        for ($i = 0; $i < $tamanho; $i++) {
            $indice = rand(0, strlen($caracteres) - 1);
            $codigo_verificacao .= $caracteres[$indice];
        }
    
        return $codigo_verificacao;
    }

    if(isset($_POST['usuarios'])){
        $usuariosCadastrados = 0;
        $usuariosErros = 0;

        foreach($_POST['usuarios'] as $user){
            $email = $user['email'];

            // Verificar se o email já existe
            $verificar_usuario = $conn->prepare("SELECT * FROM tb_usuario WHERE ds_email = :email");
            $verificar_usuario->bindParam(':email', $email);
            $verificar_usuario->execute();

            if ($verificar_usuario->rowCount() == 0) {
                // Usuário não existe, pode cadastrar
                $cadastrar_usuario = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, ds_email, ds_senha, nr_rm, nr_verificacao, id_turma, id_nivel) VALUES (:nome, :email, :senha, :rm, :verificacao, :turma, :nivel)");
                $cadastrar_usuario->bindValue(':nome', $user['nome']);
                $cadastrar_usuario->bindValue(':email', $email);
                $cadastrar_usuario->bindValue(':senha', gerarCodigo(5));
                $cadastrar_usuario->bindValue(':rm', $user['cod']);
                $cadastrar_usuario->bindValue(':verificacao', gerarCodigo(5));
                $cadastrar_usuario->bindValue(':turma', $user['turma']);
                $cadastrar_usuario->bindValue(':nivel', $user['tipo']);

                if($cadastrar_usuario->execute()){
                    $usuariosCadastrados += 1;
                }else{
                    $usuariosErros += 1;
                }
            } else {
                // Usuário já existe, incrementar contagem de erros
                $usuariosErros += 1;
            }
        }
        if ($usuariosCadastrados != 0){
            echo '<div class="alert" style="background-color: #DCEED7; border-left: 8px solid #9EB0A0; animation: none;"><i class="bi bi-check-lg "style="color: #9EB0A0";"></i><span class="msg" style="color: #9EB0A0;font-size: 17px">'.$usuariosCadastrados.' usuários cadastrados com sucesso!</span></div>';
        }
        if($usuariosErros != 0){
            echo '<div class="alert"><i class="bi bi-exclamation-circle"></i><span class="msg">'.$usuariosErros.' usuários deram erro ao cadastrar, tente novamente!</span></div>';
        }
    } else {
        echo '<div class="alert"><i class="bi bi-exclamation-circle"></i><span class="msg">Erro no envio de usuários!</span></div>';
    }
?>
