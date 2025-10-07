<?php

//abrir, ler e fechar um ficheiro

$file = fopen(filename:"ficheiro3.csv", mode:"r");  
$line = fgetcsv($file); //ler uma linha do ficheiro
//print_r($line); //mostrar o conteudo de uma linha lida

while ($line != false) //enquanto não for o fim do ficheiro
     { 
        $id = $line[0];
        $name = $line[1];

        echo "O ID é $id e o nome é $name <br>";
        $line = fgetcsv($file); //ler uma linha do ficheiro
  
}

fclose($file); //fechar o ficheiro

// write file

$file = fopen(filename:"ficheiro3.csv", mode:"a");//open
fputcsv($file, ['5','Facebook']); //write uma linha no ficheiro
fclose($file); //close




?>