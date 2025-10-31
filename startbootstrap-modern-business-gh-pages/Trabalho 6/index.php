<?php
// index.php

// inclui setupDatabase.php
$conn = include("setupDatabase.php");

// Função para exportar CSV
function exportarCSV($conn) {
    $result = $conn->query("SELECT titulo, criado_em FROM filmes ORDER BY id ASC");
    if ($result->num_rows > 0) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=filmes_imdb.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Título', 'Data de Inserção']);

        while ($row = $result->fetch_assoc()) {
            fputcsv($output, [$row['titulo'], $row['criado_em']]);
        }
        fclose($output);
        exit;
    } else {
        echo "<p>Sem filmes para exportar.</p>";
    }
}

// Se o botão de exportar for clicado
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
    exportarCSV($conn);
}

// URL do IMDb
$url = "https://www.imdb.com/chart/boxoffice/";

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_FOLLOWLOCATION => TRUE,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_USERAGENT => "Mozilla/5.0 (compatible; PHP-cURL/8.0)"
]);

$response = curl_exec($curl);

if (curl_errno($curl)) {
    die("Erro cURL:" . curl_error($curl));
}

curl_close($curl);

// Parse HTML com DOMDocument + XPath
libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML($response);
$xpath = new DOMXPath($dom);

// Extrair títulos
$movieNodes = $xpath->query('//h3[contains(@class,"ipc-title__text")]');
$filmes = [];

foreach ($movieNodes as $node) {
    $title = trim($node->nodeValue);
    if (
        strpos($title, "Recently viewed") === false &&
        strpos($title, "IMDb Charts") === false
    ) {
        $filmes[] = $title;
    }
}

// Mostrar títulos recolhidos
echo "<h2>🎬 Filmes Recolhidos do IMDb</h2>";
foreach ($filmes as $titulo) {
    echo htmlspecialchars($titulo) . "<br>";
}

// Inserir no MySQL (sem duplicar)
$stmt = $conn->prepare("INSERT INTO filmes (titulo) VALUES (?)");

foreach ($filmes as $titulo) {
    $check = $conn->prepare("SELECT id FROM filmes WHERE titulo = ?");
    $check->bind_param("s", $titulo);
    $check->execute();
    $check->store_result();
    if ($check->num_rows === 0) {
        $stmt->bind_param("s", $titulo);
        $stmt->execute();
    }
    $check->close();
}

$stmt->close();

// Mostrar filmes guardados
echo "<hr><h2>📀 Filmes Guardados no MySQL</h2>";
echo '<a href="?export=csv" style="display:inline-block;padding:10px 15px;background:#28a745;color:white;text-decoration:none;border-radius:5px;">⬇️ Exportar para CSV</a><br><br>';

$result = $conn->query("SELECT titulo, criado_em FROM filmes ORDER BY id DESC");
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='6' cellspacing='0'>
            <tr><th>Título</th><th>Data de Inserção</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row['titulo']) . "</td><td>" . $row['criado_em'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum filme encontrado na base de dados.";
}

$conn->close();
?>