<?php
        session_start();

        $username = $_SESSION['username'];

        if(!isset($username)) {
            header('Location: logIn.php'); //redirect to login page
        }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container my-5">
       <h1>chào bạn <?php echo $username?> nhé</h1>
       <a class="btn btn-primary" href="logOut.php" role="button">Đăng Xuất</a>
    </div>

</body>

</html>