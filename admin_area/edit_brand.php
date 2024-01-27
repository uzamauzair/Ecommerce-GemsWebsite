<?php

if(isset($_GET['edit_brand'])){
    $edit_br = $_GET['edit_brand'];


    $get_br = "SELECT * FROM `brands` WHERE brand_id=$edit_br";
    $result = mysqli_query($con,$get_br);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
    

}
if(isset($_POST['edit_br'])){
    $brand_title = $_POST['brand_title'];

    $update_query = "UPDATE `brands` SET brand_title='$brand_title' WHERE brand_id=$edit_br";
    $result_up = mysqli_query($con,$update_query);
    if($result_up){
        echo "<script>alert('Brand updated Successfully!')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}

?>




<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="POST" class="text-center">
            <div class="form-outline mb-4">
                <label for="" class="form-label">Category Title</label>
                <input type="text" name="brand_title" class="form-control w-50 m-auto" required="required" value="<?php echo $brand_title;  ?>">
            </div>
            <input type="submit" value="Update Brand" name="edit_br" class="btn btn-info px-3 mb-2">
    </form>
</div>
