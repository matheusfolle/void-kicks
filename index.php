<?php
require_once 'auth.php';
require 'data.php';
include 'includes/header.php';
?>

<h1>void kicks catalogue</h1>

<?php foreach ($sneakers as $item): ?>
    <div class="sneaker-box">
        <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="300px">
        <h2><?= $item['name'] ?></h2>
        <p><?= $item['cat'] ?></p>
        <a href="details.php?id=<?= $item['id'] ?>">See more</a>
    </div>
    <?php endforeach; ?>

    <?php include 'includes/footer.php'; ?>  