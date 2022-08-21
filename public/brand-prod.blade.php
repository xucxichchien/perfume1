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
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="product.blade.php" class="nav-item nav-link">Product</a>
                    </div>
                    <a href="index.html" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Iris </span></h1>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <a href="gallery.html" class="nav-item nav-link">Gallery</a>
                        <a href="index.html" class="nav-item nav-link">Log out</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- game MEnu Section Starts Here -->
    <?php
    $brandID = $_GET['id'];

        //get cate title based on id
        $sql = "SELECT brandName FROM brands WHERE brandID=$brandID";

        $res=mysqli_query($conn, $sql);

        //get the value from databae
        $row = mysqli_fetch_assoc($res);
        //get the title
        $brandName = $row['brandName'];
        ?>
    <section class="game-menu">
        <div class="container">
            <h2 class="text-center">Game Menu</h2>

            <?php 

                //query to get games based on selected cate
                $sql2 = "SELECT *FROM parfums WHERE brandID=$brandID";

                //execute
                $res2 = mysqli_query($conn, $sql2);

                //count rows
                $count2 = mysqli_num_rows($res2);

                //check games available or not
                if($count2>0)
                {
                    //game available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['prodName'];
                        $price = $row2['prodPrice'];
                        $image_name = $row2['prodImage'];
                        ?>
                             <div class="game-menu-box">
                                <div class="game-menu-img">

                                <?php
                                if($image_name == "")
                                {
                                    //not available
                                    echo "<div class='error'>image not available</div>";
                                }
                                else
                                {
                                    //available
                                    ?>
                                     <img src="../images/<?php echo $image_name; ?>" alt="image" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>
                                </div>

                            <div class="game-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="game-price">$<?php echo $price; ?></p>
                                <?php
                                echo "<a href='product-info.blade.php?id={$row2['id']}'> More Info </a>"
                                ?>

        
                </div>
            </div>
                        <?php
                    }
                }
                else
                {
                    //game not available
                    echo "<div class='error'>Game is not available</div>";
                }
            ?>    
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->