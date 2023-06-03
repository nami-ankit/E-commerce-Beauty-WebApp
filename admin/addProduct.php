<?php

session_start();

// Check if the user is logged in and isAdmin flag is set
if (!isset($_SESSION['username']) || !$_SESSION['isAdmin']) {
    header('Location: ../login.php'); // Redirect to login page
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
</head>
<body>
    <form action="addProduct.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php

require_once('../classes/product.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $product = new Product();
    $product->create($name, $price, $description, $target_file);
}
?>


