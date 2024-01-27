<?php

include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemweb</title>
    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">

                <img src="./images/logo-5.png" alt="" class="imgL">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> <!-- Responsive 3 line button -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username'])){
                            echo " <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My account</a>
                        </li>";
                        }else {
                            echo " <li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }
                        ?>
                
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><b>
                                <?php
                                    cart_item();
                                ?>
                            </b></sup> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-info" href="#">Total Price : Rs. <?php total_cart_price(); ?>.00 </a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" role="search" method="GET">
                        <!-- To bring everything flex -->
                        <input class="form-control me-2" type="search" placeholder="Blue sapphire" name="search_data" aria-label="Search">
                        <!-- <button class="btn btn-warning" type="submit">Search</button> -->
                        <input type="submit" class="btn btn-warning" value="Search" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- Calling cart function -->
        <?php cart() ?>
        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

            <?php
            
            if(!isset($_SESSION['username']) ) {
                        echo "<li class='nav-item'>
                        <a href='#' class='nav-link'>
                            <h5>Welcome Guest</h5>
                        </a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a href='#' class='nav-link'>
                            <h5>Welcome ".$_SESSION['username']."</h5>  
                        </a>
                    </li>"; //session already defined at login.php
                    }
                

                if(!isset($_SESSION['username']) ) {
                    echo "<li class='nav-item'>
                    <a href='./users_area/user_login.php' class='nav-link'> Login</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a href='./users_area/logout.php' class='nav-link'> Logout</a>
                </li>";
                }

                ?>

            </ul>
        </nav>


        <!-- Third child-->

        <div class="bg-light p-1">
            <div class="d-flex justify-content-center">
                <img src="./images/logo-3.png" alt="" class="imgL3">
                <h2 class="text-primary">&nbsp;Uzama <span class="text-info">Gems</span> </h2>
            </div>
            <p class="text-center">Specialized in All kind of Blue stones and Rough stones</p>

        </div>

        <br>
        <!-- Fourth child -->
        <div class="row">
            <!-- //created a row now we can add colums here -->
            <div class="col-md-10">
                <!-- medium screen !-->
                <!-- products -->
                <div class="row px-1 ">

                <?php
                //Calling function
                getProduct();
                getUniqueCategory();
                getUniqueBrands();
                // $ip = getIPAddress();
                // echo ' User Real IP Address - ' . $ip;
                ?>
                    
                </div> <!-- row end here -->
            </div> <!-- col-md-10 -->

            <!--side nav -->
            <div class="col-md-2 bg-secondary p-0 mb-2">
                <!-- Branch to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-primary ">
                        <a href="#" class="nav-link text-light ">
                            <h4> Brands</h4>
                        </a>
                    </li>

                    <?php
                    getBrands();
                    ?>
                </ul>
                <!-- Categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-primary ">
                        <a href="#" class="nav-link text-light ">
                            <h4> Categories</h4>
                        </a>
                    </li>
                    <?php

                    getCategory();

                    ?>

                </ul>

            </div>
        </div>
    </div>

    <!-- last child -->
    <?php
        include('./includes/footer.php');
    ?>
    </div>


    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>