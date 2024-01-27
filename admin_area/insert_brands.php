<?php

include('../includes/connect.php');

if(isset($_POST['insert_brand'])){
    $brand_tit = $_POST['brand_title'];

    //Select data from database
    $select_query = "SELECT * FROM brands WHERE brand_title='$brand_tit' " ;
    $result_sel = mysqli_query($con,$select_query);
    $numRow = mysqli_num_rows($result_sel);
    if($numRow >0){
        echo "<script> swal('Sorry! This Brand already exist...') </script>";
    } else{
        $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_tit')";
        $result = mysqli_query($con,$insert_query);
        if($result){
        echo "<script> swal('Brand has been inserted Successfully!') </script>";
    }
    }
    
}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-primary" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10">
        <input type="submit" class="bg-success text-light p-2 my-2 border-0" name="insert_brand" value="Insert Categories" >
        <!-- <button class=" btn btn-success my-2 ">Insert Brands</button> -->
    </div>
</form>