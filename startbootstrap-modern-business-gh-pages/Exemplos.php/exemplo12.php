<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //2 formas de definir arrays
    $array = [1,2,3,"amir",[10,20,30]];
    
    $array2 = array(1,2,3,4);
    
    //mostrar um array
    //echo $array;
    print_r($array);
    echo "<br>";
    var_dump($array);

/*desconstruir um array
    item 
        key or position
        value
  */
 echo "<br>"; echo "<br>"; echo "<br>";
//indexed array
$a= [ 0=>1  , 
      23=>5 ,
      'x'=> 2 , 
      'name' =>'amir'
];

    print_r($a['name']);
        

    ?>
</body>
</html>