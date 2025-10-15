<?php
// === Sempre antes de qualquer HTML ===

// Caminho e tempo de expiração
define('cor_fundo', '#ffffff');
$caminho = "/";
$expira = time() + 60 * 60 * 24 * 30; // 30 dias

// Se o utilizador escolher uma nova cor
if (isset($_POST['cor'])) {
    $corEscolhida = $_POST['cor'];
    setcookie('cor_fundo', $corEscolhida, $expira, $caminho);
    $corAtual = $corEscolhida;

// Se clicar no botão "Repor"
} elseif (isset($_POST['repor'])) {
    setcookie('cor_fundo', '', time() - 3600, $caminho); // apaga o cookie
    $corAtual = '#ffffff'; // cor padrão

// Caso contrário, tenta ler o cookie existente
} else {
    $corAtual = $_COOKIE['cor_fundo'] ?? '#ffffff';
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Preferência de Cor de Fundo</title>
    <style>
        body {
            background-color: <?= htmlspecialchars($corAtual) ?>;
            font-family: Segoe UI, sans-serif;
            color: #333;
            text-align: center;
            margin-top: 100px;
            transition: background-color 0.5s;
        }
        form {
            background: rgba(255,255,255,0.8);
            padding: 20px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        button {
            margin: 5px;
            padding: 8px 16px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button[type="submit"] {
            background-color: #0078D7;
            color: white;
        }
        button[name="repor"] {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <h2>🎨 Escolha a sua cor de fundo</h2>

    <form method="post" action="">
        <label for="cor">Cor: </label>
        <input type="color" id="cor" name="cor" value="<?= htmlspecialchars($corAtual) ?>">
        <button type="submit">Guardar</button>
        <button type="submit" name="repor">Repor padrão</button>
    </form>

    <p style="margin-top:20px;">
        Cor atual: <b><?= htmlspecialchars($corAtual) ?></b>
    </p>

    <?php if (isset($_POST['cor'])): ?>
        <p style="color:green;">✅ Preferência guardada! (expira em 30 dias)</p>
    <?php elseif (isset($_POST['repor'])): ?>
        <p style="color:red;">⚠️ Cor reposta para o padrão!</p>
    <?php endif; ?>
</body>
</html>
