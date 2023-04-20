<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        
        if (isset($_POST['username']) && isset($_POST['password'])) {
            
            include '../connectDB.php';

            $user = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE name = ? AND password = ?");
            $stmt->bind_param("ss", $user, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            // check if exist user who is authenticated
            if ($result->num_rows > 0) {
              
                echo 'login success';

                session_start();

                $_SESSION['username'] = $user;
               

                header('Location: main.php'); //redirect to main page
            } else {
                // The username or password is incorrect
                echo '<div class="alert alert-danger text-center" role="alert">
                        The username or password is incorrect
                    </div>';

            }
            
             // Close the prepared statement
             mysqli_stmt_close($stmt);

              // close connect
              mysqli_close($conn);
        

        }

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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Welcome To Vilas Viet Nam</h4>
                    </div>
                    <div class="card-body">
                        <form action="logIn.php" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="form-group text-center">
                                <a href="#">Forgot Password?</a>
                                <a href="signUp.php">Sign up?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>