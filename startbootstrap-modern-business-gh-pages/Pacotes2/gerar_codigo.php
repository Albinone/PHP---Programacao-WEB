<?php

require './vendor/autoload.php';

use RandomLib\Factory;
use SecurityLib\Strength;

$length = $_POST['length'] ?? 8;

$factory = new Factory();
$generator = $factory->getGenerator(new Strength(Strength::MEDIUM));

// Gera um código alfanumérico aleatório
$codigo = $generator->generateString($length, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Código Gerado</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .codigo { font-size: 1.4em; color: green; font-weight: bold; }
        a { display: block; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>✅ Código Gerado com Sucesso!</h2>
    <p class="codigo"><?= htmlspecialchars($codigo) ?></p>
    <a href="form.php">🔁 Gerar outro código</a>
</body>
</html>