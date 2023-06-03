<?php
require_once('./classes/accounts.php');
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();

    if ($user->login($username, $password)) {
        $username = $_SESSION['username'];
        // Login successful, redirect to another page
        header('Location: index.php');
        exit;
    } else {
        // Login failed
        $error = 'Incorrect username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<form method="POST">
    <label for="username">Username:</label><br>
    <input type="text" class="form-control" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" class= "form-control" name="password"><br>
    <input type="submit" value="Login">
    <a href="register.php">Register</a>
</form>

<?php if ($error): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>
</body>
</html>
