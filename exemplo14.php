<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php
    $names = ["amir","ana","benfica","ana","maria"];
        ?>
        <h1>Names 1</h1>
        <ul>
            <?php
                foreach ($names as $name){
                    echo "<li>" . $name . "</li>";
                }

            ?>
        </ul>
                
        <h1>Names 2</h1>
        <ul>
                <?php foreach ($names as $name) : ?>
                <li> <?php echo $name;  ?> </li>
                <?php  endforeach  ?>
        </ul>

        <h1>Names 3</h1>
        <ul>
                <?php foreach ($names as $name) : ?>
                     <?php if ($name == "ana"):?>
                        <li> <?php echo $name;  ?> </li>
                <?php  endif  ?>
                <?php  endforeach  ?>
        </ul>




    </body>
</html>