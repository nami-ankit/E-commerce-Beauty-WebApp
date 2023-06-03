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
    <link rel="stylesheet" href="./css/styles.css">
    <style>
      
  #testimonials{

padding: 3% 15%;
text-align: center;
background-color: #ef8172;
color: #fff;

}

.testimonial-image{

width: 10%;
border-radius: 100%;
margin: 20px;
}

#press{

background-color: #ef8172;
text-align: center;
padding-bottom: 3%;

}

.press-logo{

width: 15%;
margin: 20px 20px 50px;
}

.carousel-item{

padding: 3% 15%;
}
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-xxl navbar-dark bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Beauty Product</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
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
                   <a href=""><i class="fa-solid fa-cart-shopping fa-2x pe-4" style="color: #ffffff;"></i></a> 
                   <a href="login.php"><i class="fa-solid fa-user fa-2x" style="color: #ffffff;"></i></a>
                </div>
            </div>
        </nav>
        <div class="overlay d-flex align-items-center justify-content-start">
            <div>
                <h2 class="text-dark">Welcome to Rabi’s Fine Art Studio & Tattoo Inn</h2>
                <p class="text-dark">15+ years of creating paintings, sculptures, book illustrations and tattoos.<br> Here, your imagination becomes our canvas.</p>
                <a href="#" class="btn btn-dark">SHOP NOW</a>
            </div>
        </div>
    </header>

    <div class="card-container">
        <div class="card">
            <img src="product-image.jpg" alt="Product Image">
            <div class="card-content">
                <h3 class="card-title"><h3><strong><emphasis>Free Shipping</emphasis></strong></h3></h3>
                <p class="card-description"><h4>World Wide</h4></p>
            </div>
        </div>

        <div class="card">
            <img src="product-image.jpg" alt="Product Image">
            <div class="card-content">
                <h3 class="card-title"><h3><strong><emphasis>Helpline</emphasis></strong></h3></h3>
                <p class="card-description"><h4>+977 9879878769</h4></p>
            </div>
        </div>

        <div class="card">
            <img src="product-image.jpg" alt="Product Image">
            <div class="card-content">
                <h3 class="card-title"><h3><strong><emphasis>24x7 Extensive</emphasis></strong></h3></h3>
                <p class="card-description"><h4>Customer Support</h4></p>
            </div>
        </div>
    </div>
 
    <section id="testimonials">

<div id="carouselTestonomials" class="carousel slide" data-bs-ride="carousel">
<?php
require_once('./global/databaseconnection.php');
require_once('./classes/feedback.php');

$feedback = new Entry();
$results = $feedback->readAll();
?>
<div class="carousel-inner">
    <?php foreach ($results as $index => $row): ?>
        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>" data-bs-interval="4000">
        <h2 class="text-capitalize">"<?php echo $row['feedback']; ?>"</h2>
            <img class="testimonial-image" src="<?php echo $row['image']; ?>" alt="user-profile">
            <em class="text-capitalize"><?php echo $row['name'].', '.$row['date']; ?></em>
        </div>
    <?php endforeach; ?>
</div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestonomials" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselTestonomials" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


</section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

