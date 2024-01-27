<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
        <tr>
            <th>Slno</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <tr>
        <?php
        $number = 0;
        $select_br = "SELECT * FROM `brands`";
        $result_vb = mysqli_query($con,$select_br);
        while($row_vb=mysqli_fetch_assoc($result_vb)){
            $brand_id = $row_vb['brand_id'];
            $brand_title = $row_vb['brand_title'];
            $number++;


?>
        <td><?php echo $number; ?></td>
        <td><?php echo $brand_title; ?></td>
        <td> <a href='index.php?edit_brand=<?php echo $brand_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a> </td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a> </td>
        </tr>
        <?php
        }

?>
    </tbody>
</table>