<?php
$file = 'contacts.json';

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$data = json_decode(file_get_contents($file), true);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f7f7f7;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
            background-color: white;
            box-shadow: 0 0 6px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #a71d2a;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
        }
        a:hover { text-decoration: underline; }

        /* Alertas */
        .alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 12px 20px;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 999;
        }
        .alert.show { opacity: 1; }
        .alert.success { background-color: #28a745; }
        .alert.error { background-color: #dc3545; }
    </style>
</head>
<body>

    <h2>📋 Contactos Gravados</h2>

    <?php if (empty($data)): ?>
        <p>⚠️ Nenhum contacto registado ainda.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Mensagem</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($data as $index => $contact): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['nome']) ?></td>
                    <td><?= htmlspecialchars($contact['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($contact['mensagem'])) ?></td>
                    <td><?= htmlspecialchars($contact['data']) ?></td>
                    <td>
                        <form action="delete.php" method="POST" style="margin:0;"
                              onsubmit="return confirm('Tem a certeza que quer apagar este contacto?');">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit" class="delete-btn">🗑️ Apagar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="form.php">⬅️ Voltar ao formulário</a>

    <?php
    $alert = '';
    $type = '';
    if (isset($_GET['deleted'])) { $alert = 'Contacto apagado com sucesso!'; $type = 'success'; }
    if (isset($_GET['saved']))   { $alert = 'Contacto gravado com sucesso!'; $type = 'success'; }
    if (isset($_GET['error']))   { $alert = 'Ocorreu um erro ao processar o pedido!'; $type = 'error'; }
    ?>

    <?php if (!empty($alert)): ?>
        <div id="alert" class="alert <?= $type ?>"><?= $alert ?></div>
        <script>
            const alertBox = document.getElementById('alert');
            alertBox.classList.add('show');
            setTimeout(() => alertBox.classList.remove('show'), 3000);
            if (window.history.replaceState) {
                const url = new URL(window.location.href);
                url.search = '';
                window.history.replaceState({}, document.title, url);
            }
        </script>
    <?php endif; ?>

</body>
</html>
