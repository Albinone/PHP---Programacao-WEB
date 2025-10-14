<?php

//novidade do PHP 8

$frase = "PHP é uma linguagem de programação";
$palavra1 = "PHP";

echo str_starts_with($frase, $palavra1);
echo "<hr>";
echo var_dump(str_starts_with($frase, $palavra1));
echo "<hr>";
echo var_dump(str_ends_with($frase, $palavra1));


?>


