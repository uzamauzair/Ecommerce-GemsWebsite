<?php

include('../includes/connect.php');
include('../functions/common_functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
     <div class="container-fluid my-3" >  <!--100% of width and margin top and bottom 3 -->
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <!-- to bring container in the middle ypu can use these 3 classe d-flex align-items-center justify-content-center -->
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data"> 
                    <!-- using enctype we can send files / images to database -->

                    <!-- username field -->
                    <div class="form-outline mb-4 mt-2">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter username here" required name="user_username">
                        <!-- for input when we give auto complete off then no suggestions while entering -->
                    </div>

                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your eamil here" required name="user_email">
                    </div>

                     <!-- Image field -->
                     <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" placeholder="Enter username here" required name="user_image">
                    </div>


                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Password here" required name="user_password">
                    </div>

                    <!--Confirm Password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password here" required name="conf_user_password">
                    </div>

                    <!-- Address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Your address" required name="user_address">
                    </div> 

                     <!-- Contact field -->
                     <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter Contact Number" required name="user_contact">
                    </div> 

                    <div class="mt-2">
                        <input type="submit" value="Register" class="bg-primary py-2 px-3 border-0 text-light" name="user_register" id="">
                        <p class="small fw-bold mt-2 pt-2">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- Php code  -->

<?php

if(isset($_POST['user_register'])){

    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

    $user_ip = getIPAddress();

    //Select query
    $select_query = "SELECT * FROM `user_table` WHERE user_email = '$user_email' ";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count >0){
        echo "<script>alert('Sorry! Already an account registered using this email')</script>";
        echo "<script>window.open('user_registration.php','_self')</script>";
    } elseif($user_password != $conf_user_password){
        echo "<script>alert('Passwords do not match!')</script>";
        echo "<script>window.open('user_registration.php','_self')</script>";

    } else {
    //insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query = "INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";

    $sql_execute = mysqli_query($con,$insert_query);

    if($sql_execute){
        echo "<script>swal('Successfully Registered')</script>";
    } else {
        die(mysqli_error($con));
    }
    }

    //selecting cart items

    $selcet_cart_items = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $result_cart = mysqli_query($con,$selcet_cart_items);
    $rows_countCart = mysqli_num_rows($result_cart);

    if($rows_countCart > 0){
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}



?>