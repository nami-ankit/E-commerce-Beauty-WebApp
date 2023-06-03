<?php
session_start();

// Check if the user is logged in and isAdmin flag is set
if (!isset($_SESSION['username']) || !$_SESSION['isAdmin']) {
    header('Location: ../login.php'); // Redirect to login page
    exit();
}
require_once('../classes/product.php');
$product = new Product();
$products = $product->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach($products as $row): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a href="editProduct.php?productId=<?php echo $row['id']; ?>">Edit</a>
                    <a href="deleteProduct.php?productId=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
