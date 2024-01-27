<?php

include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <style>
        .imgAd {
            width: 100px;
            object-fit: contain;
            margin: 5px;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
        body {
            overflow-x: hidden;
        }
        .product_img1{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light">
            <div class="container-fluid">
                <div class="d-flex">
                <img src="../images/logo-3.png" class="imgL3" alt="">
                <h4> <span class="text-primary">&nbsp; Uzama</span> <span class="text-success">Gems</span> </h4>
                </div>
                
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link"> Welcome <?php echo $_SESSION['user_name']; ?> </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-dark">
            <h3 class="text-center p-2 text-light">Admin Dashboard</h3>
        </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">
                <div class="px-2">
                    <a href="">
                        <img src="../images/adm-1.jpg" class="imgAd" alt="">
                    </a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <div class="button text-center">
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="insert_products.php" class="nav-link my-1 "> Insert Products </a></button>
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="index.php?view_products" class="nav-link my-1 ">View Products</a></button>
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="index.php?insert_categories" class="nav-link my-1 ">Insert Category</a></button> <!--get method/get variable -->
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="index.php?view_categories" class="nav-link my-1 ">View Category</a></button>
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="index.php?insert_brands" class="nav-link my-1 ">Insert Brands</a></button>
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="index.php?view_brands" class="nav-link my-1 ">View Brands</a></button>
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="" class="nav-link my-1 ">All Orders</a></button>
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="" class="nav-link my-1 ">All Payments</a></button>
                    <button type="button"  class="btn btn-light text-dark my-3 px-2 mx-2"><a href="" class="nav-link my-1 ">List Users</a></button>
                    <button type="button"  class="btn btn-danger text-light my-3 px-2 mx-2"><a href="" class="nav-link my-1 ">Logout</a></button>
                    
                </div>
            </div>
        </div>

        <!-- fourth child -->
        

        <div class="container my-3">
        <?php

        if(isset($_GET['insert_categories'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_products'])){
            include('delete_products.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brand'])){
            include('edit_brand.php');
        }
        ?>
        </div>

    


        <!-- last child -->
    <?php include("../includes/footer.php") ?>
    </div>


    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>