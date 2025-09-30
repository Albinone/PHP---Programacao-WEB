<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    //for
   for( $x=0 ; $x < 10  ; $x++  ){
    //codigo a executar
    echo "<br> aspas - ordem - " .$x;
    echo '<br> plicas - ordem - ' .$x;
    echo "<br> aspas - ordem - $x";
    echo '<br> plicas - ordem - $x';  
   }
   
   echo "<br>";
    // while
   $numero = 8;
   while( $numero < 10 ){
    //executar o codigo
    echo $numero;

    //alguma coisa para modifica a condição
    $numero++;
}


   
    // do while
    echo "<br>";
      $numero = 5;
   do{
     //executar pelo menos 1x o codigo
     echo $numero;

     //alguma coisa para modifica a condição
      $numero++;
   }while($numero <3);
   
    //foreach
    $array = [1, "ami", "youtube", 4];

    foreach($array as $value){
         echo " " .$value;
    }

       foreach($array as $key=>$value){
         echo "<br>Na posição $key o valor é $value.";
    }

    
    ?>
</body>
</html>