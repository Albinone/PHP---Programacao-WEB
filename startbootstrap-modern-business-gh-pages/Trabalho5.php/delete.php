<?php
$file = 'contacts.json';

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'] ?? null;

    if ($index !== null) {
        $data = json_decode(file_get_contents($file), true);

        if (isset($data[$index])) {
            array_splice($data, $index, 1);
            file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header("Location: view.php?deleted=1");
            exit;
        } else {
            header("Location: view.php?error=1");
            exit;
        }
    }
}

header("Location: view.php");
exit;
?>

