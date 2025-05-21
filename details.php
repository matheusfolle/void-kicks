<?php
include 'includes/header.php';
require 'data.php';

$id = $_GET['id'] ?? null;
$selected = null;

foreach ($sneakers as $item) {
    if ($item['id'] == $id) {
        $selected = $item;
        break;
    }
}
?>

<?php if ($selected): ?>
    <h1><?= $selected['name'] ?></h1>
    <img src="<?= $selected['image'] ?>" alt="<?= $selected['name'] ?>">
    <p>Category: <?= $selected['cat'] ?></p>
    <p><?= $selected['desc'] ?></p>
<?php else: ?>
    <p>Sneaker not found.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>