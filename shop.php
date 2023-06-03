<?php

session_start();
?>
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
    <style>
         .carousel-indicators li {
            border-radius: 50%;
        }
        .carousel-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .carousel-img {
            width: 100px;
            height: 100px;
            overflow: hidden;
        }
        .carousel-img img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        ul {
    list-style-type: none;
}

    .products{

        background-color: #E7E3E3;;
    }

    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-xxl navbar-dark text-white bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand fw-bolder" href="#">Beauty Product</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="shop.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex icons p-4">
                   <a href="carts.php"><i class="fa-solid fa-cart-shopping fa-2x pe-4" style="color: #ffffff;"></i></a> 
                   <?php if (isset($_SESSION['username'])): ?>
    <div class="dropdown">
       <a ><h3 class="text-white username"><?php echo htmlspecialchars($_SESSION['username']); ?></h3></a> 
        <div class="dropdown-content">
            <a href="logout.php">Logout</a>
        </div>
    </div>
<?php else: ?>
    <a href="login.php"><i class="fa-solid fa-user fa-2x" style="color: #ffffff;"></i></a>
<?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="overlay d-flex align-items-center justify-content-start">
            <div>
               <h2 class= "text-white"> Product  </h2>
            </div>
        </div>
    </header>
<?php
require_once('./classes/product.php');
$product = new Product();
$products = $product->read();
?>

<section class="products">
    <div class="container product-container">
        <h1>Products</h1>
        <div class="row p-4">
    <?php $count = 0; ?>
    <?php foreach ($products as $product) : ?>
        <div class="col-3 text-center mb-4">
            <div class="bg-white">
                <div class="product-info">
                    <span class="text-secondary"><?php echo $product['name']; ?></span>
                    <a href="addToCart.php?productId=<?php echo $product['id']; ?>">
         <i class="fas fa-shopping-cart"></i>
            </a>
                   </div>
                <div class="product-price">
                    <span>$<?php echo $product['price']; ?></span>
                </div>
                <div class="product-image p-1">
                    <?php $imagePath = str_replace('..', '.', $product['image']); ?>
                    <img src="<?php echo $imagePath; ?>" alt="Product Image" class="w-75">
                </div>
            </div>
        </div>
        <?php $count++; ?>
        <?php if ($count % 4 === 0) : ?>
            </div><div class="row p-4">
        <?php endif; ?>
    <?php endforeach; ?>
</div>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

