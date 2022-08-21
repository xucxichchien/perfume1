<?php

session_start();
define('SITEURL', 'http://localhost/bunbobae/User/');

 define('LOCALHOST', 'localhost');
 define('DB_USERNAME', 'web1');
 define('DB_PASSWORD', 'D@nque2003');
 define('DB_NAME', 'lara0905a');
 $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database connection
 $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Iris eau de Parfum</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark pr-3" href="">FAQs</a>
                        <span class="text-dark">|</span>
                        <a class="text-dark px-3" href="">Help</a>
                        <span class="text-dark">|</span>
                        <a class="text-dark pl-3" href="">Support</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-dark pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Iris </span>eau de Parfum</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link ">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="product.blade.php" class="nav-item nav-link">Product</a>
                    </div>
                    <a href="index.html" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Iris </span></h1>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="brand.blade.php" class="nav-item nav-link">Brands</a>
                        <a href="category.blade.php" class="nav-item nav-link">Gallery</a>
                        <a href="index.html" class="nav-item nav-link">Log out</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    
        <!-- game sEARCH Section Starts Here -->
        <section class="game-search text-center">
            <div class="container">
                <?php
                 //get the search keywords
                $search = $_POST['search'];
                 ?>
                <h2>Products on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
    
            </div>
        </section>
        <!-- game sEARCH Section Ends Here -->
    
    
    
        <!-- game MEnu Section Starts Here -->
        <section class="game-menu">
            <div class="container">
           
                <h2 class="text-center">Product list</h2>
    
                <?php
    
                //sql query to get games base on search
                $sql = "SELECT * FROM parfums WHERE prodName LIKE'%$search%' OR prodDes LIKE'%$search%' ";
                $res = mysqli_query($conn,$sql);
    
                //count rows
                    $count = mysqli_num_rows($res);
    
                //check whether games available or not
                if($count>0)
                {
                    //game available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get details
                        $id = $row['id'];
                        $title = $row['prodName'];
                        $price = $row['prodPrice'];
                        $description = $row['prodDes'];
                        $image_name = $row['prodImage'];
                        ?>
    
                        <div class="game-menu-box">
                                <div class="game-menu-img">
    
                                <?php
                                    //check whether image name available
                                    if($image_name=="")
                                    {
                                        //image not available
                                        echo "<div class='error'>Image not available</div>";
                                    }
                                    else
                                    {
                                        //image available
                                        ?>
                                    <img src="images/<?php echo $image_name; ?>" alt="image" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
    
                                </div>
    
                                <div class="game-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="game-price">$<?php echo $price; ?></p>
                                    <?php
                  echo "<a href='product-info.blade.php?id={$row['id']}'> More Info </a>"
                  ?>
                                    <br>
    
                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    //not available
                    echo "<div class='error>Games not found</div>";
                }
                 ?>
    
               
                <div class="clearfix"></div>
    
                
    
            </div>
    
        </section>
    