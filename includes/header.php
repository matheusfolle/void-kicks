<?php require_once 'auth.php'; ?>

<?php if (isLoggedIn()): ?>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a>
<?php endif; ?>

<!-- <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a>
<?php endif; ?>  -->
