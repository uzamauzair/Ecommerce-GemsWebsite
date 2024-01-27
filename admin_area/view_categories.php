<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
        <tr>
            <th>Slno</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <tr>
        <?php
        $number = 0;
        $select_cat = "SELECT * FROM `categories`";
        $result_vc = mysqli_query($con,$select_cat);
        while($row_vc=mysqli_fetch_assoc($result_vc)){
            $category_id = $row_vc['category_id'];
            $category_title = $row_vc['category_title'];
            $number++;


?>
        <td><?php echo $number; ?></td>
        <td><?php echo $category_title; ?></td>
        <td> <a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a> </td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a> </td>
        </tr>
        <?php
        }

?>
    </tbody>
</table>