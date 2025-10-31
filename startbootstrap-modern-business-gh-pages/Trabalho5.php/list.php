<?php
$ficheiro = 'contacts.json';
$mensagem = '';

// Lógica para limpar os contactos (caso o botão seja pressionado)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['limpar_tudo'])) {
    file_put_contents($ficheiro, json_encode([])); // limpa o ficheiro
    $mensagem = '🗑️ Todos os contactos foram eliminados com sucesso.';
}

// Carregar contactos do ficheiro
$dados = [];
if (file_exists($ficheiro)) {
    $conteudo = file_get_contents($ficheiro);
    $dados = json_decode($conteudo, true);
    if (!is_array($dados)) {
        $dados = []; // segurança extra se o ficheiro estiver corrompido
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 30px;
        }
        h2 {
            text-align: center;
        }
        .mensagem {
            text-align: center;
            font-weight: bold;
            color: green;
            margin: 15px 0;
        }
        table {
            width: 100%;
            max-width: 900px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #0078D7;
            color: white;
        }
        .actions {
            text-align: center;
            margin-top: 30px;
        }
        .btn-limpar, .btn-voltar {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-limpar {
            background-color: #dc3545;
            color: white;
        }
        .btn-voltar {
            background-color: #0078D7;
            color: white;
        }
    </style>
    <script>
        function confirmarLimpeza() {
            return confirm("Tem certeza que deseja apagar todos os contactos?");
        }
    </script>
</head>
<body>

<h2>📋 Lista de Contactos</h2>

<?php if (!empty($mensagem)): ?>
    <p class="mensagem"><?= $mensagem ?></p>
<?php endif; ?>

<?php if (empty($dados)): ?>
    <p style="text-align:center;">Nenhum contacto disponível.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Mensagem</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (array_reverse($dados) as $contacto): ?>
                <tr>
                    <td><?= htmlspecialchars($contacto['nome']) ?></td>
                    <td><?= htmlspecialchars($contacto['email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($contacto['mensagem'])) ?></td>
                    <td><?= htmlspecialchars($contacto['data']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<div class="actions">
    <form method="post" onsubmit="return confirmarLimpeza();" style="display:inline;">
        <button type="submit" name="limpar_tudo" class="btn-limpar">🗑️ Limpar todos os contactos</button>
    </form>
    <a href="form.php" class="btn-voltar">← Voltar ao formulário</a>
</div>

</body>
</html>
✅ O que este código garante:
Requisito	Atendido?
Botão de apagar aparece mesmo sem contactos	✅
Confirmação antes de apagar	✅
Mensagem de sucesso visível após apagar	✅
Visual limpo e centralizado	✅

Se mesmo com este código o botão não aparecer, verifique:

Erro de digitação no HTML ou PHP?

A página list.php foi salva corretamente e sem cache?

Algum erro de permissão no ficheiro contacts.json? (O PHP precisa poder escrever nele)

Se quiser agora:

Exportar os contactos como .csv

Adicionar autenticação simples (admin)

Melhorar o estilo com temas

É só pedir.




