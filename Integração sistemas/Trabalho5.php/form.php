<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 50px;
            background: #f0f0f0;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin: 20px auto;
            max-width: 500px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="success">
        ✅ Contacto enviado com sucesso!
    </div>
<?php endif; ?>

<form action="handle.php" method="post">
    <h2>📬 Formulário de Contacto</h2>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" id="mensagem" rows="5" required></textarea>

    <button type="submit">Enviar</button>
</form>

</body>
</html>