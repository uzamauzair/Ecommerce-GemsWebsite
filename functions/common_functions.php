<?php

//including connect file
// include('./includes/connect.php');

//Getting products
function getProduct()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) { // we can access url data with get method
        if (!isset($_GET['brand'])) {

            $select_query = "SELECT * FROM `products` order by rand() limit 0,9";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_video = $row['product_video'];
                $product_price = $row['product_price'];

                echo "<div class='col-md-4 mb-2 '>
            <div class='card '>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text text-danger'> <b> Price : Rs. $product_price.00 </b></p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View more</a>

                </div>
            </div>
        </div>";
            }
        }
    }
}

//Display products according to categories

function getUniqueCategory()
{
    global $con;

    //condition to check isset or not
    if (isset($_GET['category'])) { // we can access url data with get method

        $category_id = $_GET['category']; //Enna nadakkudhu endu kekanum

        $select_query = "SELECT * FROM `products` WHERE category_id = $category_id ";
        $result_query = mysqli_query($con, $select_query);

        $numOfRows = mysqli_num_rows($result_query);
        if ($numOfRows == 0) {
            echo "<script>swal('Sorry, No stock available for this category')</script>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_video = $row['product_video'];
            $product_price = $row['product_price'];

            echo "<div class='col-md-4 mb-2 '>
            <div class='card '>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text text-danger'> <b> Price : Rs. $product_price.00 </b></p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View more</a>

                </div>
            </div>
        </div>";
        }
    }
}

//Display products according to brands
function getUniqueBrands()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id = $brand_id ";
        $result_query = mysqli_query($con, $select_query);

        $numOfRows = mysqli_num_rows($result_query);
        if ($numOfRows == 0) {
            echo "<script>swal('Sorry, No stock available for this Brand')</script>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_video = $row['product_video'];
            $product_price = $row['product_price'];

            echo "<div class='col-md-4 mb-2 '>
            <div class='card '>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text text-danger'> <b> Price : Rs. $product_price.00 </b></p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View more</a>

                </div>
            </div>
        </div>";
        }
    }
}

//Display Brands
function getBrands()
{
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    // $row_data = mysqli_fetch_assoc($result_brands); //to fetch data from db
    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_id = $row_data['brand_id'];
        $brand_title = $row_data['brand_title'];
        echo '<li class="nav-item bg-info ">
            <a href="index.php?brand=' . $brand_id . '" class="nav-link text-light ">' . $brand_title . '</a>
        </li>';
    }
}
//Display category
function getCategory()
{
    global $con;
    $select_cat = "SELECT * FROM categories";
    $result_cat = mysqli_query($con, $select_cat);

    while ($row_data = mysqli_fetch_assoc($result_cat)) {
        $cat_id = $row_data['category_id'];
        $cat_title = $row_data['category_title'];
        echo ' <li class="nav-item bg-info ">
            <a href="index.php?category=' . $cat_id . '" class="nav-link text-light ">' . $cat_title . '</a>
        </li> ';
    }
}

//Display all products
function getAllProduct()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) { // we can access url data with get method
        if (!isset($_GET['brand'])) {

            $select_query = "SELECT * FROM `products` order by rand() ";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_video = $row['product_video'];
                $product_price = $row['product_price'];

                echo "<div class='col-md-4 mb-2 '>
            <div class='card '>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text text-danger'> <b> Price : Rs. $product_price.00 </b></p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View more</a>

                </div>
            </div>
        </div>";
            }
        }
    }
}

//Searching products function

function search_product()
{

    global $con;

    //condition to check isset or not

    if (isset($_GET['search_data_product'])) { //getting from URL
        $search_data_value = $_GET['search_data'];

        $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%' ";
        $result_query = mysqli_query($con, $search_query);

        $numOfRows = mysqli_num_rows($result_query);
        if ($numOfRows == 0) {
            echo "<script>swal('No results match! , No products found on this category..')</script>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_video = $row['product_video'];
            $product_price = $row['product_price'];

            echo "<div class='col-md-4 mb-2 '>
            <div class='card '>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text text-danger'> <b> Price : Rs. $product_price.00 </b></p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>View more</a>

                </div>
            </div>
        </div>";
        }
    }
}
//View details function
function view_details()
{
    global $con;

    if (isset($_GET['product_id'])) {
        //condition to check isset or not
        if (!isset($_GET['category'])) { // we can access url data with get method
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
                $result_query = mysqli_query($con, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keywords = $row['product_keywords'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_video = $row['product_video'];
                    $product_price = $row['product_price'];

                    echo "<div class='col-md-4 mb-2 '>
            <div class='card '>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text text-danger'> <b> Price : Rs. $product_price.00 </b></p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                    <a href='index.php' class='btn btn-warning'>Go Home</a>

                </div>
            </div>
        </div>
        <div class='col-md-8'>
                        <!-- card related details -->
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-danger mb-5'>Product Details</h4>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin_area/product_videos/$product_video' class='card-img-top' alt='$product_title'>  
                        </div>
                    </div>
                    </div>";
                }
            }
        }
    }
}

//get ip address function

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
    // $ip = getIPAddress();
    // echo ' User Real IP Address - ' . $ip;
}

//cart function
function cart()
{

    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress(); //::1

        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $numOfRows = mysqli_num_rows($result_query);
        if ($numOfRows > 0) {
            echo "<script>alert('This item already added to the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>"; //by this _self will be open in the same page
        } else {
            $insert_query = "INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id ,'$ip',0)";
            $result_query = mysqli_query($con, $insert_query); //idhoda insert aagum
            echo "<script>alert('Item added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//function to get cart item number
function cart_item()
{

    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress(); //::1

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $ip = getIPAddress(); //::1

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//total price function

function total_cart_price(){
    global $con;
    $ip = getIPAddress(); 
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
    $result = mysqli_query($con,$cart_query); //executing the query
    $total = 0;
    while($row = mysqli_fetch_assoc($result)){
        $product_id = $row['product_id'];
        $select_product_price = "SELECT product_price FROM products WHERE product_id = $product_id";
        $resultP_query = mysqli_query($con, $select_product_price);
        $rowP = mysqli_fetch_assoc($resultP_query); //they have used while here
        $product_price = $rowP['product_price'];
        $total += $product_price;
        // while($row = mysqli_fetch_assoc($resultP_query)){
        //     $product_price = array($row['product_price']);
        //     $product_values = array_sum( $product_price ); 200,500
        //     $total += $product_values; 
        // }
    }
    echo $total;

}

// get user order details
function get_user_order_details(){
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM `user_table` WHERE username = '$username'";
    $result_user_order = mysqli_query($con,$get_details);
    while($row_order_query=mysqli_fetch_assoc($result_user_order)){
        $user_id = $row_order_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "SELECT * FROM `user_orders` WHERE user_id = $user_id AND order_status ='pending' ";
                    $result_order_pending_query = mysqli_query($con,$get_orders);
                    $row_count_pending = mysqli_num_rows($result_order_pending_query);
                    if($row_count_pending > 0){
                        echo "<h3 class='text-center my-5'>You have <span class='text-danger'>$row_count_pending</span> Pending orders</h3>
                       <h4  class='text-center'> <a href='profile.php?my_orders'> Order Details</a></h4>";
                    }else {
                        echo "<h3 class='text-center my-5'>You have zero Pending orders</h3>
                       <h4  class='text-center'> <a href='../index.php'> Explore Gems</a></h4>";
                    }
                }
            
            }
        }
    }
}
?>