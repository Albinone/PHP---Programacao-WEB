<?php

//autoload

require './vendor/autoload.php';

$factory = new RandomLib\Factory;
$generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));

$randomInt = $generator->generateInt(1, 1000);

echo "Número aleatório entre 1 e 10: " . $randomInt;

?>