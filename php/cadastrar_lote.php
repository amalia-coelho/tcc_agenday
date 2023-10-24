<?php
    session_start();
    include("conexao.php");

    function gerarCodigo($tamanho) {
        $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
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
            $cadastrar_usuario = $conn->prepare("INSERT INTO tb_usuario (nm_usuario, ds_email, ds_senha, nr_rm, id_turma, id_nivel) VALUES (:nome, :email, :senha, :rm, :turma, :nivel)");
            $cadastrar_usuario->bindValue(':nome', $user['nome']);
            $cadastrar_usuario->bindValue(':email', $user['email']);
            $cadastrar_usuario->bindValue(':senha', gerarCodigo(5));
            $cadastrar_usuario->bindValue(':rm', $user['rm']);
            $cadastrar_usuario->bindValue(':turma', 1);
            $cadastrar_usuario->bindValue(':nivel', 2);
            if($cadastrar_usuario->execute()){
                $usuariosCadastrados += 1;
            }else{
                $usuariosErros += 1;
            }
        }
        echo $usuariosCadastrados." usuários cadastrados com sucesso";
    }else{
        echo "erro no envio dos usuários";
    }
    
    ?>