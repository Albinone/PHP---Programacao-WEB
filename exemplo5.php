<?php

// operações matemáticas

$a = 8;
$b = 3;

echo "Soma: " . ($a + $b) . "<br>";
echo "Potência:" . pow($a,$b) . "<br>";
echo "Raiz quadrada de $a = " . sqrt($a);

// valor absoluto
echo "valor absoluto de -10 = " . abs(-10);

//maximo e minimo
echo "Máximo entre (3, 8, 15) = " . max(3,8,15) . "<br>";
echo "Minimo entre (3, 8, 15) = " . min(3,8,15) . "<br>";

// número aleatórios
echo "Número aleatório entre 1 e 100:" .  rand(1,100);

//arrendondamentos
$valor = 3.467;

echo "Arrendondar normal: " . round($valor) . "<br>";
echo "Arrendondar com 2 casas: " . round($valor, 2) . "<br>";
echo "Arrendondar sempre para cima: " . ceil($valor) . "<br>";
echo "Arrendondar sempre para baixo: " . floor($valor) . "<br>";

// trigonometria
$angulo = deg2rad(30); //converte graus em radianos

echo "Seno de 30 = " . sin($angulo) . "<br>";
echo "Cosseno de 30 = " . cos($angulo) . "<br>";
echo "Tangente de 30 = " . tan($angulo) . "<br>";




?>