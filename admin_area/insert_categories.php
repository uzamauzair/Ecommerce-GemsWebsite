<?php

include('../includes/connect.php');

if(isset($_POST['insert_cat'])){
    $cat_tit = $_POST['cat_title'];

    //Select data from database
    $select_query = "SELECT * FROM categories WHERE category_title='$cat_tit' " ;
    $result_sel = mysqli_query($con,$select_query);
    $numRow = mysqli_num_rows($result_sel);
    if($numRow >0){
        echo "<script> swal('Sorry! This Category already exist...') </script>";
    } else{
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$cat_tit')";
        $result = mysqli_query($con,$insert_query);
        if($result){
        echo "<script> swal('Category has been inserted') </script>";
    }
    }
    
}
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="POST" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-primary" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="Category" aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group mb-2 w-10">
        <input type="submit" class="bg-success border-0 p-2 my-2 text-light" name="insert_cat" value="Insert Categories" >
        
    </div>
</form>