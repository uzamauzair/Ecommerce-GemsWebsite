
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="POST" class="mt-5">
            <div class="form-outline mb-4">
                <input type="submit" class="form-control w-50 m-auto text-dark" name="delete" value="Delete Account">
            </div>
            <div class="form-outline mb-4">
                <input type="submit" class="form-control w-50 m-auto text-info" value="Don't delete Account" name="dont_delete">
            </div>
    </form>

    <?php

        $username_session = $_SESSION['username'];
        if(isset($_POST['delete'])){
            $delete_query = "DELETE FROM `user_table` WHERE username = '$username_session'";
            $execute_delete = mysqli_query($con,$delete_query);
            if($execute_delete){
                session_destroy();
                echo "<script>alert('Account Deleted Successfully')</script>";
                echo "<script>window.open('../index.php','_self')</script>";

            }
        }
        if(isset($_POST['dont_delete'])){
            echo "<script>window.open('profile.php','_self')</script>";

        }
    ?>