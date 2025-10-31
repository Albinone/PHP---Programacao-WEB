<?php
/*
|----
| Projeto 1 - Condidatos ao trabalho
|----

 PROBLEMA:
  * Temos uma lista de informações de pessoas com nome e idade
  * 1 - Queremos contar o número de adultos (+18 anos) e crianças
  * 2 - Queremos fazer uma lista de pessoas entre 22 e 30 anos que podem se candidatar à nossa vaga
*/

$people = [
    ['name' => 'Alice', 'age' => 30],
    ['name' => 'Bob', 'age' => 25],
    ['name' => 'Charlie', 'age' => 35],
    ['name' => 'Diana', 'age' => 28],
    ['name' => 'Ethan', 'age' => 22],
    ['name' => 'Fiona', 'age' => 27],
    [ 'name' => 'George', 'age' => 32],
    ['name' => 'Hannah', 'age' => 5],
    ['name' => 'Ian', 'age' => 29],
    ['name' => 'Jane', 'age' => 31],
    ['name' => 'Kevin', 'age' => 26],
    ['name' => 'Laura', 'age' => 23],
    ['name' => 'Mike', 'age' => 3],
    ['name' => 'Nina', 'age' => 21],
    ['name' => 'Oscar', 'age' => 33],
    ['name' => 'Paula', 'age' => 20],
    ['name' => 'Quinn', 'age' => 10],
    ['name' => 'Rachel', 'age' => 19],
    ['name' => 'Sam', 'age' => 38],
    ['name' => 'Tina', 'age' => 18],
];   

// Parte 1: Contar adultos e crianças II
$adultos = 0;
$crianças = 0;


foreach ($people as $pessoa) {
    if ($pessoa['age'] >= 18) {
        $acandidatos = [];
          if ($pessoa['age'] >= 22 && $pessoa['age'] <= 30) {
        $candidatos[] = $pessoa['name'];
    }

    } else {
        $crianças++;
    }
}

echo "Número de adultos: $adultos\n";
 echo "<br>" . "----------------------------------";
echo "<br>" . "Número de crianças: $crianças\n";
 echo "<br>" . "----------------------------------";

// Exibindo as pessoas de forma simples

if (count($candidatos) > 0) {
    echo " <br> Pessoas entre 22 e 30 anos que podem se candidatar:\n";
    foreach ($candidatos as $candidato) {
        echo " $candidato , \n";
    }
} else {
    echo " <br> Não há candidatos na faixa etária de 22 a 30 anos.\n";
}

?>
