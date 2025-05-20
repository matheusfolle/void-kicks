<?php
session_start();

$validUser = 'admin';
$validHash = password_hash('queroandardelouis' PASSWORD_DEFAULT);

$storedHash = '$2y$10$x...';

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
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
    <button type="submit">Login</button>
</form>