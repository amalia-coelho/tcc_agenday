<?php
    session_start();
    include("conexao.php");

    // Validar a extensão do arquivo
    if(!isset($_FILES['registro_alunos'])){
        echo "VAZIO";
    }else{
        if ($_FILES['registro_alunos']['type'] == "text/csv") {
            //select tipoUsuario
                $sql_selectTipo = "SELECT * FROM tb_nivel";
                $selectTipo = "<select class='select hidden-select'>";
                foreach ($conn->query($sql_selectTipo) as $option) {
                    $selectTipo .= "<option value='".$option['cd_nivel']."'>".$option['nm_nivel']."</option>";
                }
                $selectTipo .= "</select>";
            //fim select TipoUsuario

            //select turma
                $sql_turma = "SELECT * FROM tb_turma";
                $selectTurma = "<select class='select hidden-select'>";
                foreach ($conn->query($sql_turma) as $option) {
                    $selectTurma .= "<option value='".$option['cd_turma']."'>".$option['nm_turma']."</option>";
                }
                $selectTurma .= "</select>";
            //fim select Turma

            // Ler os dados do arquivo
            $dados_arquivo = fopen($_FILES['registro_alunos']['tmp_name'], "r");

            $tabela = "<table class='table table-hover' id='tabelaUsuarios'>";
            //THEAD
            $tabela .= "<thead class='thead'><tr><th scope='col'>Código</th><th scope='col'>Nome</th><th scope='col'>Tipo de usuário</th><th scope='col'>Turma</th><th scope='col'>Email</th><th scope='col'>Ações</th></tr></thead><tbody>";
            // Pular a primeira linha
            fgetcsv($dados_arquivo, 1000, ",");
            while($linha = fgetcsv($dados_arquivo, 1000, ",")){
                $tabela .= "<tr><td class='codigo' onclick='habilitarEdicao(this)'>".$linha[0]."</td><td class='nome' onclick='habilitarEdicao(this)'>".$linha[1]."</td><td class='tipoUsuario' onclick='abrirSelect(this)'>".$selectTipo."</td><td class='turma' onclick='abrirSelect(this)'>".$selectTurma."</td><td class='email' onclick='habilitarEdicao(this)'>".$linha[2]."</td><td class='edit' style='width: 100px;'><a onclick='apagarLinha(event.target)'><i class='bi bi-trash'></i></a></td></tr>";
            }
            $tabela .= "</tbody></table>";
            echo $tabela;
        }
    }

// Criar função valor por referência, isto é, quando alter o valor dentro da função, vale para a variável fora da função.
function converter(&$dados_arquivo){
    // Converter para utf-8 para imprimir corretamente os caracteres especiais
    $dados_arquivo = mb_convert_encoding($dados_arquivo, "UTF-8", "ISO-8859-1");
}
?>