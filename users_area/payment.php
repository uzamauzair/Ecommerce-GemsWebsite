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
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <?php

    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM `user_table` WHERE user_ip = '$user_ip'";
    $result = mysqli_query($con,$get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];


    ?>
     <div class="container"> <!-- no 100% width -->

     <h2 class="text-center text-info">Payment Options</h2>
     <div class="row d-flex justify-content-center align-items-center mt-5">
         <div class="col-md-6"> <!--means give 6 col space in medium screen -->
         <a href="https://www.paypal.com" target="_blank">
            <img src="../images/paypal.png" alt="">
        </a>
        </div>
        <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id ?>" > 
            <p class="text-center"><input type="button" class="btn btn-primary" value="Pay Offline">
        </p>    
        </a>
        </div>
     </div>
    </div>
</body>
</html>