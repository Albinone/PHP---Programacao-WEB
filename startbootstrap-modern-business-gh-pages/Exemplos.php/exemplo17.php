<?php
//jon
/*
{
"accounts": {
    "X": "https://www.x.com",
    "facebook": "https://www.facebook.com",
    "instagram": "https://www.instagram.com",
    "linkedin": "https://www.linkedin.com",
    "github": "https://www.github.com",
}
}

//xml
<?xml version="1.0" encoding="UTF-8"?>
<accounts>
    <account type="X">https://www.x.com</account>
    <account type="facebook">https://www.facebook.com</account>
    <account type="instagram">https://www.instagram.com</account>
    <account type="linkedin">https://www.linkedin.com</account>
    <account type="github">https://www.github.com</account>
</accounts>
*/

$json = '
{
"accounts": {
    "X": "https://www.x.com",
    "facebook": "https://www.facebook.com",
    "instagram": "https://www.instagram.com",
    "linkedin": "https://www.linkedin.com",
    "github": "https://www.github.com"
}
}';

$array = json_decode($json, associative:true);

print_r($array);//1º exemplo
echo "<hr>";
print_r($array['accounts']);//2º exemplo
echo "<hr>";
print_r($array['accounts']['facebook']);//3º exemplo
echo "<hr>";

$accounts = $array['accounts'];//4º exemplo
foreach($accounts as $key => $value){
    echo $key . " : " . $value . "<br>";
   
}

//write json
$array = [
    "accounts" => [
        "X" => "https://www.x.com",
        "facebook" => "https://www.facebook.com",
        "instagram" => "https://www.instagram.com",
        "linkedin" => "https://www.linkedin.com",
    
    ]
];
//$json = json_encode($array, JSON_PRETTY_PRINT);
$json = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
echo "<hr>";
echo $json;

print_r(json_decode($json, associative:true));

?>

