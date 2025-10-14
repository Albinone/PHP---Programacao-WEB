<?php

$texto = "Olá PHP"; //string
$numero = 42;       // integer
$decimal = 3.14;     //float
$verdade = true;    // boolean
$lista = ["azul", "verde", "benfica"]; //array
$nada = null;       // null

//Mostrar tipo de dados
echo "Tipo de \$texto: " .gettype($texto) . "<br>";
echo "Tipo de \$numero: " .gettype($numero) . "<br>";
echo "Tipo de \$decimal: " .gettype($decimal) . "<br>";
echo "Tipo de \$verdade: " .gettype($verdade) . "<br>";
echo "Tipo de \$lista: " .gettype($lista) . "<br>";
echo "Tipo de \$nada: " .gettype($nada) . "<br>";
echo "<br>";
//Mostrar tipo e valor com var_dump
echo "<br>" .var_dump($texto);
echo "<br" .var_dump($numero);
echo "<br>" .var_dump($decimal);
echo "<br" .var_dump($verdade);
echo "<br>" .var_dump($lista);
echo "<br>" .var_dump($nada);

// verificação do  tipo
$idade = 20;

if (is_int($idade))  {
    echo "A variável \$idade é um número inteiro.";
}
else
{ 
    echo "A variável \$idade não é um número inteiro.";
}

echo "<br><br>";
// conversão de tipo (casting)
$numero = "100";  // string
echo gettype($numero) . "<br>";

$numero = (int)$numero;  //converter para inteiro
echo gettype($numero)  //integet
?>