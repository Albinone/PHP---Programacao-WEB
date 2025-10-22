<?php

try {
    $pdo = new PDO('mysql:host=localhost:3307;dbname=dbtest', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão bem-sucedida!<br>";

} catch (PDOException $e) {
    echo "Erro na conexão ou execução: " . $e->getMessage();
}

    ?>