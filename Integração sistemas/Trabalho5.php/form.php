<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f7f7f7;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 6px rgba(0,0,0,0.1);
            max-width: 400px;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .reset-btn {
            background-color: #dc3545;
            margin-left: 10px;
        }
        .reset-btn:hover {
            background-color: #a71d2a;
        }
        a.view-link {
            display: inline-block;
            margin-top: 20px;
            color: #007BFF;
            text-decoration: none;
        }
        a.view-link:hover {
            text-decoration: underline;
        }
        /* Alertas visuais */
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

    <h2>Formulário de Contacto</h2>

    <form action="handle.php" method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="mensagem" placeholder="Mensagem" rows="5" required></textarea>
        <button type="submit" name="action" value="gravar">Enviar</button>
        <button type="submit" name="action" value="reset" class="reset-btn" 
            onclick="return confirm('Tem a certeza que quer apagar todos os registos?');">
            Reset Registos
        </button>
    </form>

    <a href="view.php" class="view-link">📋 Ver contactos gravados</a>

    <?php
    $alert = '';
    $type = '';
    if (isset($_GET['reset'])) { $alert = 'Todos os registos foram apagados!'; $type = 'success'; }
    if (isset($_GET['error'])) { $alert = 'Todos os campos são obrigatórios!'; $type = 'error'; }
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
