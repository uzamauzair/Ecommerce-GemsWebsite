<?php
require_once "../includes/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>ADMIN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>ADMIN Login</h2>
  </div>
	 
  <form method="post" action="">
  	
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_admin">Login</button>
  	</div>
  	
  </form>
  <?php
if(isset($_POST['login_admin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `admin_info` WHERE user_name = '$username' AND password = '$password' ";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['user_name'] = $username;
            echo "<script>window.open('index.php','_self')</script>";
      
    }else {
      echo "Invalid credentials";
    }
}

?>
</body>
</html>