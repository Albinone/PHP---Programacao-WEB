<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

//Switch case
echo "Switch <br>";
$dia = 2; // 1 = segunda, 7 = domingo
switch($dia) {

    case 1: echo "Segunda-feira"; break;
    case 2: echo "Terça-feira"; break;
    case 3: echo "Quarta-feira"; break;
    case 4: echo "Quinta-feira"; break;
    case 5: echo "Sexta-feira"; break;
    case 6:   //sabado
    case 7: echo "Fim de semana"; break;  //domingo
    default: echo "dia inválido";
}
echo "<br><br>Match1<br>";
// match
$dia = 8;
$nomeDia = match($dia) {
    1 => "Segunda-feira",
    2 => "Terça-feira",
    3 => "Quarta-feira",
    4 => "Quinta-feira",
    5 => "Sexta-feira",
    6 => "Sábado",
    7 => "Domingo",
    default => "dia inválido"
};

echo $nomeDia;
echo "<br><br>Match2<br>";
// fim de semana
$dia = 7;
$nomeDia = match($dia) {
    1 => "Segunda-feira",
    2 => "Terça-feira",
    3 => "Quarta-feira",
    4 => "Quinta-feira",
    5 => "Sexta-feira",
    6,7 => "fim de semana",
    default => "dia inválido"
};

echo $nomeDia;

echo "<br><br>Match3<br>";
$nota = "f";
$notafinal = match($nota) {
    "A" => "Excelente",
    "B" => "Bom",
    "C" => "Suficiente",
    default => "Nota inválida"
};

echo $notafinal;


echo "<br><br>Match4<br>";
$nota = 21;
$notafinal = match(true) {
    $nota >= 18 && $nota <=20  => "Aprovado com Excelente",
    $nota >= 15 && $nota <=20  => "Aprovado com mérito",
    $nota >= 10 && $nota <=20  => "Aprovado",
    $nota  >= 0 && $nota < 10  => "Reprovado",
    default     => "Inválido"
};

echo $nota . " - " . $notafinal;

    ?>

</body>
</html>