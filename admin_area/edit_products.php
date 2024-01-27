<?php

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    //echo $edit_id;
    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
    $result_edit = mysqli_query($con,$get_data);
    $row = mysqli_fetch_assoc($result_edit);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id   = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_video  = $row['product_video'];
    $product_price = $row['product_price'];

    //fetching category name
    $select_cate = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($con,$select_cate);
    $row_cate = mysqli_fetch_assoc($result_category);
    $category_title = $row_cate['category_title'];

    // fetching brands name
    $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($con,$select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}


?>



<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label">Product Title</label>
            <input type="text" name="product_title" value="<?php echo $product_title ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label">Product Description</label>
            <input type="text" name="product_description" value="<?php echo $product_description ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label">Product Keyword</label>
            <input type="text" name="product_keyword" value="<?php echo $product_keywords ?>"  class="form-control" required>
        </div>

        <div class="form-outline w-50 m-auto mb-3">
        <label for="" class="form-label">Product Category</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php

                $select_cate_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con,$select_cate_all);
                while($row_cate_all = mysqli_fetch_assoc($result_category_all)){

                    $category_title = $row_cate_all['category_title'];
                    $category_id = $row_cate_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }          
?>

            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
        <label for="" class="form-label">Product Brands</label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                <?php

                    $select_brand_all = "SELECT * FROM `brands`";
                    $result_brand_all = mysqli_query($con,$select_brand_all);
                    while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){

                        $brand_title = $row_brand_all['brand_title'];
                        $brand_id = $row_cate_all['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }          
                    ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label">Product Image1</label>
            <div class="d-flex">
              <input type="file" name="product_image1" class="form-control w-90 m-auto" required>
              <img src="./product_images/<?php echo $product_image1 ?>" class="product_img1" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label">Product Image2</label>
            <div class="d-flex">
              <input type="file" name="product_image2"  class="form-control w-90 m-auto" required>
              <img src="./product_images/<?php echo $product_image2 ?>" class="product_img1" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label">Product Video</label>
            <div class="d-flex">
              <input type="file" name="product_video" class="form-control w-90 m-auto" >
              <img src="./product_videos/<?php echo $product_video ?>" class="product_img1" alt="">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label">Product Price</label>
            <input type="text" name="product_price" value="<?php echo $product_price ?>" class="form-control" required>
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update Product" class="bt btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- editing products -->

<?php

if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand   = $_POST['product_brand'];
    $product_price = $_POST['product_price'];

    // get category id
    $select_cat_id = "SELECT * FROM `categories` WHERE category_title = '$product_category' ";
    $result_cat_id = mysqli_query($con,$select_cat_id);
    $row_cat_id = mysqli_fetch_assoc($result_cat_id);
    $product_cate_id = $row_cat_id['category_id'];

    // get brand id
    $select_brand_id = "SELECT * FROM `brands` WHERE brand_title = '$product_brand' ";
    $result_brand_id = mysqli_query($con,$select_brand_id);
    $row_brand_id = mysqli_fetch_assoc($result_brand_id);
    $product_brand_id = $row_brand_id['brand_id'];


    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_video  = $_FILES['product_video']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_video  = $_FILES['product_video']['tmp_name'];

    
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_video,"./product_videos/$product_video");

        //Query to update 
        $update_query = "UPDATE `products` SET product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_video='$product_video',product_price='$product_price' WHERE product_id=$edit_id";
        $result_add_product = mysqli_query($con,$update_query);
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    



?>