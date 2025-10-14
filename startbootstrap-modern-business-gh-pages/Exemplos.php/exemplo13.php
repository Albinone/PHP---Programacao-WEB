
     <?php

     //breack

    $names = ["amir","ana","benfica","maria"];
    $foundIt = false;
    $searchName ="maria";

    foreach ($names as $name) {
       // echo $name .PHP_EOL;
         echo $name ."<br>";
        if ($name == $searchName){
             $foundIt = true;
            break;
        }
    }

    if ($foundIt){
    echo "Fez match com lista:" . $name . " e BREAK";   
    }
    else{
        echo "<br>"."O nome".$searchName." procurado não existe na lista";
         echo "<br>" . "----------------------------------";
    }


    //continue
     echo "<br>----------------------------------";

$numbers = [ 3, 3000, 457, 786, 234];
    foreach ($numbers as $number){
        //echo "<br>" .$number;

        if ($number % 3 == 0)
        {    continue;    }
        else
        { echo "<br<br>".$number; }

    }

    




    ?>
