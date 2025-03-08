<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <h2>Congratulations, you have successfully logged in!</h2>
        <p>Name: <?php echo htmlspecialchars(isset($_SESSION['name']) ? $_SESSION['name'] : 'Not set'); ?></p>
        <p>Email: <?php echo htmlspecialchars(isset($_SESSION['email']) ? $_SESSION['email'] : 'Not set'); ?></p>
        <p>Password: <?php echo htmlspecialchars(isset($_SESSION['password']) ? $_SESSION['password'] : 'Not set'); ?></p>
        <a href="index.php" class="logout-button">Logout</a>
    </div>
</body>
</html>