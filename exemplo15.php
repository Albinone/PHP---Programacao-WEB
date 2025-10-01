<?php

//working with files

/*
1. open file
2. read / write file
3. close file
*/

//1. open file

echo "<hr>";

$file =fopen(filename: './ficheiro.txt' , mode: 'r');

/*flag modes
r - read
w - write (erases all content)
a - write (append at the of file)
*/

// 2. read file
$line = fgets($file);
while($line != false){
    echo $line . "<br>";
    $line = fgets($file);
} 

//3. close file
fclose($file);


//Exemplo 2 read

echo "<hr>";

//1. open file
$file =fopen(filename: './ficheiro.txt' , mode: 'r');
$content = fread($file, filesize("./ficheiro.txt"));

//2. read / write file
echo $content;

//3. close file
fclose($file);









?>
