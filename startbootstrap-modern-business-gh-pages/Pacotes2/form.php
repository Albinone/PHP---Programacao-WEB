<?php
// Página inicial com formulário HTML
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gerador de Códigos Aleatórios</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { margin-top: 20px; }
        input[type="text"] { width: 250px; padding: 5px; }
        button { padding: 6px 12px; cursor: pointer; }
    </style>
</head>
<body>
    <h2>🔑 Gerador de Código Aleatório</h2>
    <form method="POST" action="gerar_codigo.php">
        <label>Comprimento do código:</label>
        <input type="number" name="length" min="4" max="20" value="8" required>
        <button type="submit">Gerar Código</button>
    </form>
</body>
</html>
<?