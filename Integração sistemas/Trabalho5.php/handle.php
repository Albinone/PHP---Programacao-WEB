<?php
// Verifica se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    // Validação simples
    if ($nome === '' || $email === '' || $mensagem === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('❌ Dados inválidos. Volte atrás e preencha todos os campos corretamente.');
    }

    // Monta o novo contacto
    $novoContacto = [
        'nome' => $nome,
        'email' => $email,
        'mensagem' => $mensagem,
        'data' => date('Y-m-d H:i:s')
    ];

    $ficheiro = 'contacts.json';

    // Verifica se o ficheiro já existe
    if (file_exists($ficheiro)) {
        $dadosExistentes = json_decode(file_get_contents($ficheiro), true);
        if (!is_array($dadosExistentes)) {
            $dadosExistentes = [];
        }
    } else {
        $dadosExistentes = [];
    }

    // Adiciona o novo contacto
    $dadosExistentes[] = $novoContacto;

    // Grava novamente o ficheiro
    file_put_contents($ficheiro, json_encode($dadosExistentes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Redireciona para o formulário com confirmação
    header('Location: form.php?success=1');
    exit;
} else {
    // Acesso direto indevido
    header('Location: form.php');
    exit;
}