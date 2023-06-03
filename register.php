<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Product</title>
    <script src="https://kit.fontawesome.com/148b4e7843.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-iBB6b6Yg5g5UZUJ9yG+9zixOIdnQd1zX0BdDZH1UPTUhFJXBD5V2p7WElJ27bFlZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<form method="POST" action="register.php">
    <div class="mb-3">
        <label>Email address</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label>Username: </label>
        <input type="name" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
<?php
require_once './global/databaseconnection.php';
require_once 'classes/accounts.php'; 

$user = new User();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $isAdmin = 0; 

    $result = $user->register($username, $password, $email, $isAdmin);
    if ($result) {
        echo "Registration successful!";
        header('Location:login.php');
    } else {
        echo "Registration failed.";
    }
}
