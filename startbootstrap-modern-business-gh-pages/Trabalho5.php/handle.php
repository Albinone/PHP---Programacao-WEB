<?php
$file = 'contacts.json';

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // --- RESET ---
    if ($action === 'reset') {
        file_put_contents($file, json_encode([]));
        header("Location: form.php?reset=1");
        exit;
    }

    // --- GRAVAR CONTACTO ---
    if ($action === 'gravar') {
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $mensagem = trim($_POST['mensagem'] ?? '');

        if ($nome && $email && $mensagem) {
            $data = json_decode(file_get_contents($file), true);
            $data[] = [
                'nome' => htmlspecialchars($nome),
                'email' => htmlspecialchars($email),
                'mensagem' => htmlspecialchars($mensagem),
                'data' => date('Y-m-d H:i:s')
            ];
            file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header("Location: view.php?saved=1");
            exit;
        } else {
            header("Location: form.php?error=1");
            exit;
        }
    }
}
?>
