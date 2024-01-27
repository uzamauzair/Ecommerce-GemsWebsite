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
    <title>Cart Details</title>
    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
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
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
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
                    </ul>
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
                <h2 class="text-primary">&nbsp;Uzama<span class="text-info">Gems</span> </h2>
            </div>
            <p class="text-center">Specialized in All kind of Coloured stones and Rough stones</p>

        </div>

        <br>
        <!-- Fourth child table -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">


                        <?php

                        global $con; //not needed her because we not calling functions here
                        $ip = getIPAddress();
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
                        $result = mysqli_query($con, $cart_query); //executing the query
                        $total = 0;
                        $numOfRows = mysqli_num_rows($result);
                        if ($numOfRows > 0) {
                            echo "<thead>
                                <th>Product Title</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </thead>
                            <tbody>";
                            while ($rowp = mysqli_fetch_assoc($result)) {
                                $product_id = $rowp['product_id'];
                                $select_product_price = "SELECT * FROM products WHERE product_id = $product_id";
                                $resultP_query = mysqli_query($con, $select_product_price);
                                $row = mysqli_fetch_assoc($resultP_query); //they have used while here
                                $product_price = $row['product_price'];
                                $product_title = $row['product_title'];
                                $product_image1 = $row['product_image1'];


                                $total += $product_price;

                        ?>
                                <tr>
                                    <td> <?php echo $product_title; ?></td>
                                    <td>
                                        <img src="./admin_area/product_images/<?php echo $product_image1; ?>" style="width: 70px; height:60px; object-fit :fit-content;" alt="">
                                    </td>
                                    <td>
                                        <input type="number" class="form-input w-50 align-self-center" name="qty">
                                    </td>
                                    <td><?php echo $product_price; ?>.00</td>
                                    <td>

                                        <input type="checkbox" name="removeItem[]" value="<?php echo $product_id  ?>"> <!-- to store we use to delete we use array -->

                                    </td>
                                    <td>
                                        <!-- <button class="btn btn-success mx-1">Update Cart</button> -->
                                        <input type="submit" class="btn btn-success mx-1" name="update_cart" value="Update Cart">
                                        <!-- <button class="btn btn-danger mx-1">Remove Cart</button> -->
                                        <input type="submit" class="btn btn-danger mx-1" name="remove_cart" value="Remove Cart">
                                    </td>
                                    <?php
                                    $get_ip = getIPAddress();
                                    if (isset($_POST['update_cart'])) {
                                        $quantities = $_POST['qty'];
                                        $update_cart = " UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip'";
                                        $result_Product_query = mysqli_query($con, $update_cart);
                                        $total = $total * $quantities;
                                    }
                                    ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                    </table>

                    <!-- Subtotal -->
                    <div class="d-flex">
                        <h4 class="px-4">
                            Subtotal : <strong class="text-danger"><?php echo $total; ?>.00</strong>
                        </h4>
                        <!-- <a href="index.php">
                            <button class="btn btn-primary  ">Continue Shopping</button>
                        </a> -->
                        <input type="submit" value="Continue Shopping" class="btn btn-primary" name="continue_shopping" >
                    
                        <button class="btn btn-warning mx-2 "> <a href="./users_area/checkout.php" class="text-light text-decoration-none">Checkout</a></button>
                        
                    </div>
                </form>
        
    <?php } else {
                   echo " <h3 class='text-danger text-center' > Cart is Empty </h3> 
                   <input type='submit' value='Continue Shopping' class='btn btn-primary' name='continue_shopping' > ";     } 
                   
                   if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                   }
                   
                   ?>

    <!-- function to remove item -->
    <?php

    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            foreach ($_POST['removeItem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id ";
                $result_delete = mysqli_query($con, $delete_query);
                if ($result_delete) {
                    echo "<script>swal('Item deleted Successfully')</script>";
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            } // [] no need beacause each and every time when user click the checkbox the item will be added to the array removeItem[]
        }
    }
    echo $remove_item = remove_cart_item();
    ?>
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