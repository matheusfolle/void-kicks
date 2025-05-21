<?php
session_start();

$notLoggedIn = !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true;

if ($notLoggedIn) {
    header('Location: login.php');
    exit;
}

require 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new = [
        'id' => uniqid(),
        'name'=> $_POST['name'] ?? '',
        'cat' => $_POST['cat'] ?? '',
        'image' => $_POST['image'] ?? '',
        desc => $_POST['desc'] ?? ''
    ];
    $_SESSION['newones'][] = $new;
}

$all = array_merge($sneakers, $_SESSION['newones'] ?? []);
?>

<h1>Protected Area - Add Sneaker</h1>

<form method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="cat" placeholder="Category" required>
    <input type="text" name="image" placeholder="Image URL" required>
    <textarea name="desc" placeholder="Description"></textarea>
    <button type="submit">Add Sneaker</button>
</form>

<hr>

<h2>All Sneakers</h2>

<?php foreach ($all as $item): ?>
    <div>
        <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="200px">
        <h3><?= $item['name'] ?></h3>
        <p><?= $item['cat'] ?></p>
        <p><?= $item['desc'] ?></p>
    </div>
<?php endforeach; ?>