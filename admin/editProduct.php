<?php
require_once('../classes/product.php');

session_start();

// Check if the user is logged in and isAdmin flag is set
if (!isset($_SESSION['username']) || !$_SESSION['isAdmin']) {
    header('Location: ../login.php'); // Redirect to login page
    exit();
}
$product = new Product();

// get product details
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $currentProduct = $product->getProductById($productId); 
} else {
    die('No product ID provided');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $currentProduct['name']; ?>"><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" value="<?php echo $currentProduct['price']; ?>"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?php echo $currentProduct['description']; ?></textarea><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

// process form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "../images/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $product->update($productId, $name, $price, $description, $target);
    header('Location:  index.php');
}
?>
