<?php
// setupDatabase.php
$servername = "localhost";
$username = "root";
$password = ""; // altera se necessário
$dbname = "imdb";

// 1. Ligar ao MySQL (sem selecionar DB ainda)
$conn = new mysqli($servername, $username, $password);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de ligação: " . $conn->connect_error);
}

// 2. Criar base de dados se não existir
$sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql) === TRUE) {
    // echo "Base de dados verificada/criada com sucesso.<br>";
} else {
    die("Erro ao criar BD: " . $conn->error);
}

// 3. Seleciona base de dados
$conn->select_db($dbname);

// 4. Criar tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    // echo "Tabela 'filmes' pronta.<br>";
} else {
    die("Erro ao criar tabela: " . $conn->error);
}

return $conn; // devolve ligação para outros scripts
?>
