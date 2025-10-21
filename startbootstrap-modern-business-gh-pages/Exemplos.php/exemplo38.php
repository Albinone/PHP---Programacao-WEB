<?php

//validation & sanitization de dados de entrada em PHP

// validação de email

//preg_match($pattern,$email)

//filters

//versão >= PHP 8.0
//strip_tags()
//remove todas as tags HTML e JavaScript


$variable = "test@sd.com";
if(!filter_var($variable, filter: FILTER_VALIDATE_EMAIL)) {
    echo "Email inválido";
} else {
    echo "Email válido";
}

echo "<br>";

$url = "https://www.sapo.pt";
if(!filter_var($url, filter: FILTER_VALIDATE_URL)) {
    echo "URL inválido";
} else {
    echo "URL válido";
}

echo "<br>";
//sanitização
$variable = "<p>Hello World!</p>";
$flag = FILTER_SANITIZE_STRING;
$sanitazedData = filter_var($variable,$flag);
echo $sanitazedData;

// Remove tags HTML e espaços desnecessários
$sanitizedData = strip_tags(trim($variable));
echo $sanitizedData;
echo "<br>";

echo "<br>";
$variable = "<p>tesste@example.com</p>";
$flag = FILTER_SANITIZE_EMAIL;
$sanitazedData = filter_var($variable,$flag);
echo $sanitazedData;

echo "<br>";

// Remove tags e caracteres inválidos no email
$sanitizedData = filter_var(strip_tags($variable), $flag );
echo $sanitizedData;

?>