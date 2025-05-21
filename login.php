<?php
require_once 'auth.php';
include 'includes/header.php';

$validUser = 'admin';
$validHash = password_hash('queroandardelouis', PASSWORD_DEFAULT);

$storedHash = '$2y$10$Jd8siocmLTTQHQCmWVT5VeVpzg/nGGHBN44vircnC6ID653arEg/O';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if ($user === $validUser && password_verify($pass, $storedHash)) {
        $_SESSION['loggedin'] = true;
        header('Location: protected.php');
        exit;
    } else {
        $error = 'Invalid credentials.';
    }
}
?>

<h1>Login</h1>

<?php if ($error): ?>
    <p style="color:red;"><=? $error ?></p>
<?php endif; ?>

<form method="post">
    <input type="text" name="user" placeholder="Username" required>
    <input type="password" name="pass" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<?php include 'includes/footer.php'; ?>