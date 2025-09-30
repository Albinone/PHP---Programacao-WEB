<?php
//if simples

$idade = 18;

if ($idade >= 18) {
    echo "Pode votar!";
}

//if else
$nota = 9;

if ($nota >= 10){
    echo "Aprovado";
}
else
{
    echo "reprovado";
}

// if else if else

$hora = date("H");

if ($hora < 12) {
    echo "Bom dia";
} elseif ($hora < 18) {
    echo "Boa tarde.";
} else {
    echo "Boa noite.";
}

//if aninhado  (if dentro de if)
$idade = 20;
$temCarta  = true;

if ($idade >=18) {
    if ($temCarta) {
        echo "Pode conduzir";
    } 
    else { 
        echo "é maior de idade, mas não tem carta";
    }
} else {
    echo "ainda não pode conduzir.";
}


// operador ternário
$idade = 17;

if ($idade >= 18) 
   { echo "Maior de idade"; }
else
    { echo "Menor de idade";} 

echo ($idade >= 18) ? "Maior de idade": "Menor de idade";


//Switch case
$dia = date("N"); // 1 = segunda, 7 = domingo

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

?>