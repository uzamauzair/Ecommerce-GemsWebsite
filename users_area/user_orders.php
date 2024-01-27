
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>
    <?php

    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_get_user = mysqli_query($con,$get_user);
    $row_fetch = mysqli_fetch_assoc($result_get_user);
    $user_id = $row_fetch['user_id'];

    ?>
<h3 class="text-center text-success" >All my Orders</h3>
<table class="table table-bordered mt-5 ">
    <thead class="bg-info">
    <tr>
        <th>Sl no</th>
        <th>Amount Due</th>
        <th>Total products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
        $get_order_details = "SELECT * FROM `user_orders` WHERE user_id=$user_id";
        $result_orders = mysqli_query($con,$get_order_details);
        $number = 1;
        while($row_fetchs = mysqli_fetch_assoc($result_orders)){
                $order_id = $row_fetchs['order_id'];
                $amount_due = $row_fetchs['amount_due'];
                $invoice_number = $row_fetchs['invoice_number'];
                $total_products = $row_fetchs['total_products'];
                $order_status  = $row_fetchs['order_status'];
                if($order_status == 'pending'){
                    $order_status = 'Incomplete';
                }else {
                    $order_status = 'Complete';
                }
                $order_date   = $row_fetchs['order_date'];
                

                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>"; ?>
                <?php 
                if($order_status=='Complete'){
                    echo "<td class='text-light'>PAID</td> </tr>";
                }
                 else {
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td> </tr>";
                };
            
                $number++;
        }
        
    ?>
    
    </tbody>
</table>
</body>
</html>


