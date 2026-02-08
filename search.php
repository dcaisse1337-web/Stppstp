<?php
$data = json_decode(file_get_contents("data.json"), true);

$query = strtolower($_GET['q'] ?? "");
$results = [];

foreach ($data as $item) {
    if (strpos(strtolower($item['name']), $query) !== false) {
        $results[] = $item;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1 class="title">⚡ RESULTS ⚡</h1>

    <a href="index.php" class="back">← Back</a>

    <?php if(empty($results)): ?>
        <p>No target found...</p>
    <?php else: ?>
        <?php foreach($results as $r): ?>
            <div class="card">
                <h2><?= $r['name'] ?></h2>
                <p><?= $r['info'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>
