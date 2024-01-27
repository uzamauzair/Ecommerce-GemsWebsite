<?php

if(isset($_GET['edit_category'])){
    $edit_cat = $_GET['edit_category'];


    $get_categories = "SELECT * FROM `categories` WHERE category_id=$edit_cat";
    $result = mysqli_query($con,$get_categories);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
    

}
if(isset($_POST['edit_cat'])){
    $cat_title = $_POST['category_title'];

    $update_query = "UPDATE `categories` SET category_title='$cat_title' WHERE category_id=$edit_cat";
    $result_up = mysqli_query($con,$update_query);
    if($result_up){
        echo "<script>alert('Category updated Successfully!')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?>




<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="POST" class="text-center">
            <div class="form-outline mb-4">
                <label for="" class="form-label">Category Title</label>
                <input type="text" name="category_title" class="form-control w-50 m-auto" required="required" value="<?php echo $category_title;  ?>">
            </div>
            <input type="submit" value="Update Category" name="edit_cat" class="btn btn-info px-3 mb-2">
    </form>
</div>
