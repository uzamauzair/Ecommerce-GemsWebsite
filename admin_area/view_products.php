



    <h2 class="text-center text-success">All Products</h2>
    <table class="table table-bordered mt-5">
            <thead class="bg-info">
                <tr>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Total sold</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light text-center">

                <?php

                $get_products = "SELECT * FROM `products`";
                $result_gp = mysqli_query($con,$get_products);
                while($row=mysqli_fetch_assoc($result_gp)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $status = $row['status'];
                    ?>
                    <tr>
                    <td> <?php echo $product_id; ?></td>
                    <td><?php echo $product_title; ?></td>
                    <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img1'/></td>
                    <td><?php echo $product_price; ?></td>
                    <td>
                    <?php 
                    $get_count = "SELECT * FROM `orders_pending` WHERE product_id=$product_id";
                    $result_gc = mysqli_query($con,$get_count);
                    $rows_count = mysqli_num_rows($result_gc);
                    echo $rows_count;

                    ?>
                    </td>
                    <td><?php echo $status; ?></td>
                    <td> <a href='index.php?edit_products=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a> </td>
                    <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a> </td>
                 </tr>

                    <?php

                }

                ?>
                 
            </tbody>
    </table>
