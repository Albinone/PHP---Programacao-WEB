<?php
// imdb_scraper.php
// RECOLHE OS TITULOS DOS FILMES DO SITE https://www.imdb.com/chart/boxoffice/
// 1. MOSTRA NA PÁGINA WEB
// 2. GRAVA EM MYSQL
// 3. MOSTRA OS FILMES QUE ESTÃO EM MYSQL

require_once "setupDatabase.php";
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>🎬 IMDb Web Crawler</title>
<style>
body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; color: #222; }
h1, h2 { color: #444; }
ul, ol { background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 0 5px #ccc; }
li { margin: 5px 0; }
.status { padding: 10px; border-radius: 8px; margin-bottom: 15px; font-weight: bold; }
.ok { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
.error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
.info { background: #cce5ff; color: #004085; border: 1px solid #b8daff; }
</style>
</head>
<body>

<h1>🎬 IMDb Web Crawler - Filmes em Exibição</h1>

<?php
try {
    // Conecta à base de dados
    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "<div class='status ok'>✅ Conexão à base de dados '$db' estabelecida com sucesso.</div>";

    // --------------------------------------------
    // 1️⃣ RECOLHE OS TÍTULOS DOS FILMES (cURL)
    // --------------------------------------------
    $url = "https://www.imdb.com/chart/boxoffice/";
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_USERAGENT => "Mozilla/5.0 (compatible; PHP-cURL/8.0)"
    ]);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        die("<div class='status error'>❌ Erro cURL: " . curl_error($curl) . "</div>");
    }

    curl_close($curl);

    echo "<div class='status info'>🌐 HTML do site IMDb recolhido com sucesso.</div>";

    // --------------------------------------------
    // 2️⃣ ANALISA O HTML (DOM + XPATH)
    // --------------------------------------------
    libxml_use_internal_errors(true);

    $dom = new DOMDocument();
    $dom->loadHTML($response);
    $xpath = new DOMXPath($dom);

    // Extrair os títulos (tags h3 com a classe ipc-title__text)
    $movieNodes = $xpath->query('//h3[contains(@class,"ipc-title__text")]');
    $filmes = [];

    foreach ($movieNodes as $node) {
        $title = trim($node->nodeValue);

        // Ignorar textos desnecessários
        if (
            strpos($title, "Recently viewed") === false &&
            strpos($title, "IMDb Charts") === false &&
            $title !== ""
        ) {
            $filmes[] = $title;
        }
    }

    // --------------------------------------------
    // 3️⃣ MOSTRA OS FILMES RECOLHIDOS
    // --------------------------------------------
    if (empty($filmes)) {
        echo "<div class='status error'>⚠️ Nenhum título encontrado.</div>";
    } else {
        echo "<h2>🎞️ Filmes encontrados no site IMDb</h2><ul>";
        foreach ($filmes as $titulo) {
            echo "<li>" . htmlspecialchars($titulo) . "</li>";
        }
        echo "</ul>";
    }

    // --------------------------------------------
    // 4️⃣ GRAVA OS FILMES NA BASE DE DADOS
    // --------------------------------------------
    if (!empty($filmes)) {
        $pdo->exec("TRUNCATE TABLE `$table`"); // limpa antes de atualizar

        $stmt = $pdo->prepare("INSERT INTO `$table` (titulo) VALUES (:titulo)");

        foreach ($filmes as $titulo) {
            $stmt->execute([':titulo' => $titulo]);
        }

        echo "<div class='status ok'>💾 Base de dados atualizada com sucesso (" . count($filmes) . " filmes adicionados).</div>";
    }

    // --------------------------------------------
    // 5️⃣ MOSTRA FILMES GUARDADOS NO MYSQL
    // --------------------------------------------
    echo "<h2>📦 Filmes guardados em MySQL</h2><ol>";
    foreach ($pdo->query("SELECT titulo, data FROM `$table` ORDER BY id ASC") as $row) {
        echo "<li>" . htmlspecialchars($row['titulo']) . " <small>[" . $row['data'] . "]</small></li>";
    }
    echo "</ol>";

} catch (PDOException $e) {
    echo "<div class='status error'>❌ Erro de base de dados: " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>
</body>
</html>