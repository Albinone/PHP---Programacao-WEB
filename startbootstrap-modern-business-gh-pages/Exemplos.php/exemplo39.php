<?php


//Database

//criar a base de dados e tabela no phpmyadmin
/* nome: dbtest
example - 2 colunas
    id - int PK AI
    name - varchar(100)
 */

//Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=dbtest', username:'root', password:'');

//insert
    //exec() executa SQL diretamente, sem proteção contra SQL Injection.
    //Em produção, deve-se usar prepared statements com prepare() e execute().

//* 1º exemplo - não seguro
//$count = $pdo->exec(statement: "INSERT INTO example (name) VALUES ('João')");
//$lastId = $pdo->lastInsertId();
//echo "Registos inseridos: " . $count . "and the last inserted id is " .$lastId . "<br>";

//* 2º exemplo - prepared statements
$pdo->beginTransaction();
$pdo->exec(statement: "INSERT INTO example (name) VALUES ('maria')");
$pdo->exec(statement: "INSERT INTO example (name) VALUES ('gomes')");
$pdo->exec(statement: "INSERT INTO example (name) VALUES ('dias')");
$pdo->exec(statement: "INSERT INTO example (name) VALUES ('junior')");
$pdo->commit();

//3º exemplo
$name = "Ana Silva";
$stm = $pdo->prepare(query: 'INSERT INTO example (name) VALUES (?)');
$stm->bindValue(1, $name);
$stm->execute();


//update 
$name = "Carlos M";
$id = 1;
$stm = $pdo->prepare(query: 'UPDATE example SET name=? where id=?');
$stm->bindValue(1,$name);
$stm->bindValue(2,$id);
$stm->execute();

//delete
$id =2;
$stm = $pdo->prepare(query:'DELETE FROM example where id=?');
$stm->bindValue(1,$id);
$stm->execute();

echo "<hr>";
//select
$statement = $pdo->prepare('SELECT * FROM example'); // prepare the SQL query
$statement->execute(); // run the query

$rows = $statement->fetchAll(PDO::FETCH_ASSOC); // fetch all rows as associative arrays

foreach ($rows as $row) {
    echo htmlspecialchars($row['id'] ." - ".$row['name']) . "<br>";
}

echo "<hr>";
$name = "João";
$stm = $pdo->prepare(query:'SELECT * FROM example where name=?');
$stm->bindValue(1,$name);
$stm->execute();
$rows = $stm->fetchAll(PDO::FETCH_ASSOC); // fetch all rows as associative arrays

foreach ($rows as $row) {
    echo htmlspecialchars($row['id'] ." - ".$row['name']) . "<br>";
}

?>