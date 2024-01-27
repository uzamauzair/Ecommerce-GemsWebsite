<?php

if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
    $delete_query = "DELETE FROM `products` WHERE product_id = $delete_id";
    $execute_delete = mysqli_query($con,$delete_query);
    if($execute_delete){
        echo "<script>alert('Product Deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}


?>