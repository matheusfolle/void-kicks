<?php
require 'data.php';

$selectedCat = $_GET['cat'] ?? null;
$filtered = [];

if ($selectedCat) {
    foreach ($sneakers as $item) {
        if ($item['cat'] === $selectedCat) {
            $filtered[] = $item;
        }
    }
} else {
    $filtered = $sneakers;
}
?>

<h1>Categories' Filter</h1>

<form method="get">
    <select name="cat">
        <option value="">All</option>
        <option value="Street">Street</option>
        <option value="Techwear">Techwear</option>
        <option value="Performance">Performance</option>
        <option value="Retro Futurism">Retro Futurism</option>
    </select>
    <button type="submit">Filter</button>
</form>

<?php foreach ($filtered as $item): ?>
    <div class="sneaker-box">
        <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
        <h2><?= $item['name'] ?></h2>
        <p><?= $item['cat'] ?></p>
        <a href="details.php?id=<?= $item['id'] ?>">See more</a>
    </div>
<?php endforeach; ?>