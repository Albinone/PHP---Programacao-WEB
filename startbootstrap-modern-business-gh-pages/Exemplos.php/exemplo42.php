<?php

//Primeiro exemplo

// correr comandos de sistema

//comando simples + cuidado com as permissões e com funções desativadas em php.ini

//exec('mkdir pasta2' , $output, $result_code);

//print_r($output);

//echo "Exit Code: " . $result_code;

//2º exemplo

$dir = 'test2';

if (is_dir($dir)) {
    
      echo "O Diretório já existe. ";
    }
            else 
        {
    echo "O diretório não existe.";
    if (mkdir($dir,0755, true)) {

        echo " Diretório criado com sucesso.";
      
    } 
    else
    {
        echo "Falha ao criar o diretório. Verificar permissões. <br>";
    }
}



?>
