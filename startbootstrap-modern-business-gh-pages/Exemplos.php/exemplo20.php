<?php

//isset

$nome = "John";

var_dump($nome); 
echo "<hr>";
var_dump(isset($nome)); 
echo "<hr>";
echo "<br>";

$nome = "0";

var_dump($nome); 
echo "<hr>";
var_dump(isset($nome)); 
echo "<hr>";
echo "<br>";


$nome = null;

var_dump($nome); 
echo "<hr>";
var_dump(isset($nome)); 
echo "<hr>";
echo "<br>";

//empty

$nome2 = "Carlos";

var_dump($nome2); 
echo "<hr>";
var_dump(empty($nome2)); 
echo "<hr>";
echo "<br>";

$nome2 = "";

var_dump($nome2); 
echo "<hr>";
var_dump(empty($nome2)); 
echo "<hr>";
echo "<br>";

$nome2 = Null;

var_dump($nome2); 
echo "<hr>";
var_dump(empty($nome2)); 
echo "<hr>";
echo "<br>";

?>


