<?php
require_once "setupDatabase.php";

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="filmes_imdb.csv"');

// Adiciona BOM UTF-8 (corrige acentuação no Excel)
echo "\xEF\xBB\xBF";

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Título', 'Data de Registo']);

try {
    // Ligação PDO com charset UTF-8
    $dsn = "mysql:host={$server};port={$port};dbname={$db};charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ]);

    // Ajusta conforme os nomes reais da tua tabela
    $stmt = $pdo->query("SELECT id, titulo, criado_em AS data FROM `$table` ORDER BY id ASC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rows)) {
        fputcsv($output, ["(sem registos na base de dados)"]);
    } else {
        foreach ($rows as $row) {
            // Garante que todos os valores estão em UTF-8
            $row = array_map(function($v) {
                if (is_null($v)) return '';
                if (!mb_check_encoding($v, 'UTF-8')) {
                    $v = mb_convert_encoding($v, 'UTF-8', 'auto');
                }
                return $v;
            }, $row);

            fputcsv($output, $row);
        }
    }

} catch (PDOException $e) {
    fputcsv($output, ["Erro: " . $e->getMessage()]);
}

fclose($output);
exit;
?>