<?php
    session_start();

    // Validar a extensão do arquivo 
if ($_FILES['registro_alunos']['type'] == "text/csv") {
    // Ler os dados do arquivo
    $dados_arquivo = fopen($_FILES['registro_alunos']['tmp_name'], "r");

    $tabela = "<table id='tabelaUsuarios'>";
    // Percorrer o array de dados do arquivo
    $primeiraLinha = True;
    $primeiroRegistro = True;
    while($linha = fgetcsv($dados_arquivo, 1000, ",")){
        // Usar array_walk_recursive para criar função recursiva com PHP
        array_walk_recursive($linha, 'converter');
        if($primeiraLinha == true){
            $tabela .= "<thead><tr><th>".$linha[0]."</th><th>".$linha[1]."</th><th>".$linha[2]."</th></tr></thead>";
            $primeiraLinha = false;
        }elseif ($primeiroRegistro == true) {
            $tabela .= "<tbody><tr><td class='rm'>".$linha[0]."</td><td class='nome'>".$linha[1]."</td><td class='email'>".$linha[2]."</td></tr>";
            $primeiroRegistro = false;
        }else{
            $tabela .= "<tr><td class='rm'>".$linha[0]."</td><td class='nome'>".$linha[1]."</td><td class='email'>".$linha[2]."</td></tr>";
        }
    }
    $tabela .= "</tbody></table>";
    echo $tabela;
} else {
    echo "Necessário enviar arquivo csv!";
}

// Criar função valor por referência, isto é, quando alter o valor dentro da função, vale para a variável fora da função.
function converter(&$dados_arquivo){
    // Converter para utf-8 para imprimir corretamente os caracteres especiais
    $dados_arquivo = mb_convert_encoding($dados_arquivo, "UTF-8", "ISO-8859-1");
}
?>