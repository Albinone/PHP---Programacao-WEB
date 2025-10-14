<?php

// Definir a minha data de nascimento diretamente
$dataNascimento = '1964-03-06'; 

// Função para calcular a idade em anos
function calcularIdadeEmAnos($dataNascimento) {
    // Converter a data de nascimento para um objeto DateTime
    $dataNascimentoObj = new DateTime($dataNascimento);
    
    // Obter a data atual
    $dataAtual = new DateTime();

    // Calcular a diferença em anos
    $intervalo = $dataNascimentoObj->diff($dataAtual);
    $anos = $intervalo->y; // A propriedade 'y' contém a diferença de anos

    return $anos;
}

// Função para calcular a idade em dias
function calcularIdadeEmDias($dataNascimento) {
    // Criar objetos DateTime para data de nascimento e data atual
    $dataNascimentoObj = date_create($dataNascimento); // Usa date_create()
    $dataAtualObj = date_create('today'); // A data atual também é criada com 'today'

    // Calcular a diferença em dias
    $intervalo = date_diff($dataNascimentoObj, $dataAtualObj); // Calcular a diferença

    // Retornar a quantidade de dias totais
    return $intervalo->days; // 'days' contém o número total de dias
}

// Função para calcular os dias até o próximo aniversário, a data do próximo aniversário e os dias desde o último aniversário
function aniversarios($dataNascimento) {
    // Criar objeto DateTime para data atual
    $dataAtualObj = date_create('today'); // Data atual

    // Criar um novo objeto DateTime para o próximo aniversário
    $dataNascimentoObj = date_create($dataNascimento);

    // Definir o ano atual para o próximo aniversário
    $anoAtual = date_format($dataAtualObj, 'Y');
    $dataNascimentoObj->setDate($anoAtual, date_format($dataNascimentoObj, 'm'), date_format($dataNascimentoObj, 'd'));

    // Se o aniversário já passou este ano, atualizar para o próximo ano
    if ($dataNascimentoObj < $dataAtualObj) {
        $dataNascimentoObj->setDate($anoAtual + 1, date_format($dataNascimentoObj, 'm'), date_format($dataNascimentoObj, 'd'));
    }

    // Calcular a diferença em dias até o próximo aniversário
    $intervaloProximo = date_diff($dataAtualObj, $dataNascimentoObj);
    $diasRestantes = $intervaloProximo->days;

    // Formatar a data do próximo aniversário
    $dataProximoAniversario = date_format($dataNascimentoObj, 'd/m/Y'); // Exemplo: 15/05/2026

    // Calcular o último aniversário
    $dataNascimentoObj->setDate($anoAtual, date_format($dataNascimentoObj, 'm'), date_format($dataNascimentoObj, 'd'));
    if ($dataNascimentoObj > $dataAtualObj) {
        $dataNascimentoObj->setDate($anoAtual - 1, date_format($dataNascimentoObj, 'm'), date_format($dataNascimentoObj, 'd'));
    }

    // Calcular a diferença em dias desde o último aniversário
    $intervaloUltimo = date_diff($dataNascimentoObj, $dataAtualObj);
    $diasPassadosUltimoAniversario = $intervaloUltimo->days;

    return [
        "diasRestantes" => $diasRestantes,
        "dataProximoAniversario" => $dataProximoAniversario,
        "diasPassadosUltimoAniversario" => $diasPassadosUltimoAniversario
    ];
}

// Exemplo de uso
$anos = calcularIdadeEmAnos($dataNascimento);
$dias = calcularIdadeEmDias($dataNascimento);
$aniversarios = aniversarios($dataNascimento);

echo "Idade em anos: $anos anos\n";
 echo "<br>" . "----------------------------------"."<br>";
echo "Idade em dias: $dias dias\n";
 echo "<br>" . "----------------------------------"."<br>";
echo "Faltam {$aniversarios['diasRestantes']} dias para o seu próximo aniversário, que será em {$aniversarios['dataProximoAniversario']}.\n";
 echo "<br>" . "----------------------------------"."<br>";
echo "Já passaram {$aniversarios['diasPassadosUltimoAniversario']} dias desde o seu último aniversário.\n";

?>