<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<?php

// GLOBAL SCOPE
$x = 5;

function test1() {
    // vai gerar erro
    echo "<p>Valor de x é: " . $x  . "</p>";
}

test1();

// LOCAL SCOPE
function test2(){
    $x = 10;
    echo "<p>Valor de x é: " . $x  . "</p>";
}

test2();

function test3() {
    global $x;
    echo "<p>Valor de x é: " . $x  . "</p>";
}

test3();



?>

</body>
</html>