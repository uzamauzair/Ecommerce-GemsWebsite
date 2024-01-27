<?php

include('../includes/connect.php');
include('../functions/common_functions.php');
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">

    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid my-3">
        <!--100% of width and margin top and bottom 3 -->
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-3">
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

                    <!-- Password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter Password here" required name="user_password">
                    </div>


                    <div class="mt-2">
                        <input type="submit" value="Login" class="bg-primary py-2 px-3 border-0 text-light" name="user_login" id="">
                        <p class="small fw-bold mt-2 pt-2">Dont you have have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

include('../includes/connect.php');

if (isset($_POST['user_login'])) {
    global $con;
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username'";
    $result_login = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result_login);

    $row_data = mysqli_fetch_assoc($result_login); //data is here
    $user_ip = getIPAddress();

    //cart item
    $select_item = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $execute_cart = mysqli_query($con,$select_item);
    $rows_count_item = mysqli_num_rows($execute_cart);

    if ($rows_count > 0) {

        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Login Successfully.')</script>";
            if($rows_count ==1 and $rows_count_item==0){
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successfull.')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successfull.')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>swal('Invalid Credentials')</script>";
        }

        // $_SESSION['username'] = $user_username;
        // echo "<script>window.open('../index.php','_self')</script>";
    } else {
        echo "<script>swal('Invalid Credentials')</script>";
    }
}



?>