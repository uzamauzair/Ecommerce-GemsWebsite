<?php

include('../includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product - Admin Dashboard</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="bg-light">
    <div class="container my-3">
        <h1 class="text-center ">Insert Products</h1>
        <!-- form start-->
        <div class="card w-75 m-auto">
            <div class="card-body ">


                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- product title -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="product-title" class="form-label">Product title</label>
                        <input type="text" name="product_title" id="product_title" class="form-control w-90" autocomplete="off" placeholder="Enter Product Title" required>
                        <!--lable's for and input's id should be same -->
                    </div>

                    <!-- product description -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="description" class="form-label">Product Description</label>
                        <input type="text" name="description" id="description" class="form-control w-90" autocomplete="off" placeholder="Enter Product Description" required>
                        <!--lable's for and input's id should be same -->
                    </div>

                    <!-- keywords -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="keywords" class="form-label">Product Keywords</label>
                        <input type="text" name="keywords" id="keywords" class="form-control w-90" autocomplete="off" placeholder="Enter Product keywords" required>
                    </div>

                    <!-- categories -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <select name="product_category" class="form-select" id="">
                            <option hidden>Select a Category</option>
                            <?php

                            $select_cat = "SELECT * FROM categories";
                            $result_cat = mysqli_query($con, $select_cat);


                            while ($row_dat = mysqli_fetch_assoc($result_cat)) { //to fetch data from database
                                $cat_title = $row_dat['category_title'];
                                $cat_id = $row_dat['category_id'];
                                echo "<option value='$cat_id'>$cat_title</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- brands -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <select name="product_brand" class="form-select" id="">
                            <option hidden>Select a Brand</option>
                            <?php

                            $select_brand = "SELECT * FROM brands";
                            $result_brand = mysqli_query($con, $select_brand);


                            while ($row_dat = mysqli_fetch_assoc($result_brand)) { //to fetch data from database
                                $brand_title = $row_dat['brand_title'];
                                $brand_id = $row_dat['brand_id'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Image 1 -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="product_image1" class="form-label">Product Image 1</label>
                        <input type="file" name="product_image1" id="product_image1" class="form-control" required>
                    </div>

                    <!-- Image 2 -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="product_image2" class="form-label">Product Image 2</label>
                        <input type="file" name="product_image2" id="product_image2" class="form-control" required>
                    </div>
                    <!-- Video -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="product_video" class="form-label">Product Video</label>
                        <input type="file" accept="video/mp4,video/x-m4v,video/*" name="product_video" id="product_video" class="form-control ">
                    </div>
                    <!-- Product price -->
                    <div class="form-outline mb-4 w-75 m-auto">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="text" name="product_price" id="product_price" class="form-control" autocomplete="off" placeholder="Enter Product Price" required>
                    </div>

                    <!-- Insert Button -->
                    <div class="form-outline mb-4 w-75 m-auto">

                        <input type="submit" name="insert_product" value="Insert Product" class="btn btn-success mb-3 px-3">
                    </div>


                </form>
            </div>
        </div>
    </div>
<script>
 if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
</script>
</body>

</html>
<?php

if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    //accessing images and videos
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_video = $_FILES['product_video']['name'];

    //accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_video = $_FILES['product_video']['tmp_name'];

    //checking empty condition
    if ($product_title == '' || $description == '' || $keywords == '' || $product_category == '' || $product_brand == '' || $product_price == '' ||  $product_image1 == '' || $product_image2 == '') {

        echo "<script>swal('Please fill all required fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_video,"./product_videos/$product_video");

        //insert product
        $insert_products = "INSERT INTO `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_video,product_price,date,status) VALUES ('$product_title','$description','$keywords', '$product_category','$product_brand','$product_image1','$product_image2','$product_video','$product_price', NOW(),'true') ";

        $result_query = mysqli_query($con,$insert_products);
        if($result_query){
            
            echo "<script> swal('Product has been inserted successfully') </script>";
           
        }
    }
}
       

?>