<?php
require_once 'auth.php';
requireLogin();
require 'data.php';

$id = $_GET['id'] ?? null;
$selected = null;

$all = array_merge($sneakers, $_SESSION['newones'] ?? []);

foreach ($all as $item) {
    if ($item['id'] == $id) {
        $selected = $item;
        break;
    }
}

if (!$selected) {
    echo "<p>Sneaker not found.</p>";
    exit;
}
?>

<?php include 'includes/header.php'; ?>

<h1><?= $selected['name'] ?></h1>
<img src="<?= $selected['image'] ?>" alt="<?= $selected['name'] ?>" width="300">
<p>Category: <?= $selected['cat'] ?></p>
<p>Description: <?= $selected['desc'] ?></p>

<a href="protected.php">← Back</a>

<?php include 'includes/footer.php'; ?>