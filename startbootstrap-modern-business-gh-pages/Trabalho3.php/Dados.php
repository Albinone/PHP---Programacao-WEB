<?php
 
$data = '{
    "Portugal": "+351",
    "Espanha": "+34",
    "França": "+33",
    "Alemanha": "+49",
    "Itália": "+39",
    "Reino_Unido": "+44",
    "Estados_Unidos": "+1",
    "Canadá": "+1",
    "Brasil": "+55",
    "Argentina": "+54",
    "Chile": "+56",
    "México": "+52",
    "Japão": "+81",
    "China": "+86",
    "Índia": "+91"
}';

$dados = json_decode($data, true);

$procurado = "Portugal";

if(array_key_exists($procurado, $dados)){
    echo "O código do país " . $procurado . " é: " . $dados[$procurado];
}else{
    echo "País não encontrado.";
}

$paises = json_decode($data, true);


$ficheiro = 'indicativos.csv';


$handle = fopen($ficheiro, 'w');


fputcsv($handle, ['País', 'Indicativo']);

// Escreve os dados
foreach ($paises as $pais => $indicativo) {
    fputcsv($handle, [$pais, $indicativo]);
}

fclose($handle);

echo "<br>Ficheiro CSV '$ficheiro' criado com sucesso.";
?>

