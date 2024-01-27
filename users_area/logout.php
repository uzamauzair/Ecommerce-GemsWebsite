<?php

session_start();
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="row p-4">
        <div class="col-md-4 ">
            <a href="../index.php" class="btn btn-info">Go Home</a>
        </div>
        <div class="col-md-4">
            <a href="userlogin.php" class="btn btn-primary">Login Here</a>
        </div>
    </div>
</body>
</html>