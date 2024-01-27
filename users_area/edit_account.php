<?php

if(isset($_GET['edit_account'])){
    $user_session_name  = $_SESSION['username'];

    $get_user_details = "SELECT * FROM `user_table` WHERE username = '$user_session_name'";
    $execute_udQuery = mysqli_query($con,$get_user_details);
    $row_udData = mysqli_fetch_assoc($execute_udQuery);

    $user_id = $row_udData['user_id'];
    $user_name = $row_udData['username'];
    $user_email =$row_udData['user_email'];
    $user_image = $row_udData['user_image'];
    $user_address = $row_udData['user_address'];
    $user_mobile = $row_udData['user_mobile'];

    if(isset($_POST['user_update'])){
        
        $user_name = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_tmp,"./user_images/$user_image");

         $update_user = "UPDATE `user_table` SET username ='$user_name', user_email = '$user_email',user_image = '$user_image', user_address = '$user_address', user_mobile = '$user_mobile' WHERE user_id = $user_id";

         $result_update_user = mysqli_query($con,$update_user);
         if($result_update_user){
            echo "<script>swal('Your account updated successfully!')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
            
         }
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<body>
    <h3 class="text-center text-success">Edit Account</h3>
    <form action="" method="POST" enctype="multipart/form-data" class="text-center">
            <div class="form-outline my-4">
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name; ?>" name="user_username">
            </div>
            <div class="form-outline my-4">
                <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email; ?>" name="user_email">
            </div>
            <div class="form-outline my-4 d-flex w-50 m-auto">
                <input type="file" class="form-control " name="user_image">
                <img src="./user_images/<?php echo $user_image ?>" class="edit_img" alt="">
            </div>
            <div class="form-outline my-4">
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address; ?>" name="user_address">
            </div>
            <div class="form-outline my-4">
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile; ?>" name="user_mobile">
            </div>      
            <input type="submit" class="btn btn-primary" name="user_update" value="Update" >
    </form>
</body>
</html>