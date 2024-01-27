<?php

include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result_data = mysqli_query($con,$select_data);
    $row_fetch_data = mysqli_fetch_assoc($result_data);
    $invoice_number = $row_fetch_data['invoice_number'];
    $amount_due = $row_fetch_data['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    
    $insert_query = "INSERT INTO `user_payments` (order_id,invoice_number,amount,payment_mode) VALUES ($order_id,$invoice_number,$amount,'$payment_mode') ";
    $result_insert = mysqli_query($con,$insert_query);
    if($result_insert){
        echo "<script>alert('Successfully confirmed the payment')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
    $result_update = mysqli_query($con,$update_orders);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5">
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $invoice_number ; ?>" name="invoice_number">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $amount_due ; ?>" name="amount">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-light">Payment mode</label>
                <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option hidden >Select Payment mode</option>
                    <option >UPI</option>
                    <option >Netbanking</option>
                    <option >Paypal</option>
                    <option >Cash on delivery</option>
                    <option >Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                
                <input type="submit" class="bg-info py-2 px-3 border-0 text-dark" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>