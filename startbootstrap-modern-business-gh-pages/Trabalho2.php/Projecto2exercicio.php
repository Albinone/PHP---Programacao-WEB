<?php

// Definir a data de nascimento
$dataNascimento = '1964-03-06';

// Função para calcular a idade em anos, dias, e aniversários
function calcularDadosAniversario($dataNascimento) {
    $dataAtual = new DateTime();
    $dataNascimentoObj = new DateTime($dataNascimento);
    
    // Calcular idade em anos e dias
    $anos = $dataNascimentoObj->diff($dataAtual)->y;
    $dias = $dataNascimentoObj->diff($dataAtual)->days;

    // Calcular próximo e último aniversário
    $anoAtual = $dataAtual->format('Y');
    $proximoAniversario = clone $dataNascimentoObj;
    $proximoAniversario->setDate($anoAtual, $proximoAniversario->format('m'), $proximoAniversario->format('d'));
    if ($proximoAniversario < $dataAtual) $proximoAniversario->setDate($anoAtual + 1, $proximoAniversario->format('m'), $proximoAniversario->format('d'));

    $ultimoAniversario = clone $proximoAniversario;
    if ($proximoAniversario > $dataAtual) $ultimoAniversario->setDate($anoAtual - 1, $ultimoAniversario->format('m'), $ultimoAniversario->format('d'));
    
    // Retorna os resultados
    return [
        'anos' => $anos,
        'dias' => $dias,
        'diasRestantes' => $dataAtual->diff($proximoAniversario)->days,
        'diasPassados' => $dataAtual->diff($ultimoAniversario)->days,
        'proximoAniversario' => $proximoAniversario->format('d/m/Y')
    ];
}

// Exemplo de uso
$dados = calcularDadosAniversario($dataNascimento);

// Exibição dos resultados
echo "Idade em anos: {$dados['anos']} anos\n";
echo "<br>----------------------------------<br>";
echo "Idade em dias: {$dados['dias']} dias\n";
echo "<br>----------------------------------<br>";
echo "Faltam {$dados['diasRestantes']} dias para o seu próximo aniversário, que será em {$dados['proximoAniversario']}.\n";
echo "<br>----------------------------------<br>";
echo "Já passaram {$dados['diasPassados']} dias desde o seu último aniversário.\n";

?>