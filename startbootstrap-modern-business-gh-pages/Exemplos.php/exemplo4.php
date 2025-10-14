<?php

//concatenação de Texto  operador .
$nome = "Carlos";
$frase = "Bem-vindo " . $nome . " ao PHP<br>";

echo $frase;

//constantes
define("PI",3.14159 );
echo "O valor de PI é " . PI . "<br>";

//fuso horario 
date_default_timezone_set("Europe/Lisbon");

// trabalhar com datas e horas
echo "Hoje é " . date("d/m/Y") . "<br>";
echo "Agora são " .date("H:i:s");

echo "Dia da semana (l): " .date("l") ."<br>";
echo "Nome do mês (F): " .date("F") ."<br>";
echo "Data completa: " .date("l, d F Y") ."<br>";
?>