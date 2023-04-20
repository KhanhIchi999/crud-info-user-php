
<?php

    include '../connectDB.php';
  

    // check if user click on submit button
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        // get value of form by method post
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];


        $sql = "SELECT * FROM users WHERE name = '$name'";
        $resultUser = mysqli_query($conn, $sql);

        // Check if user is available
        if (mysqli_num_rows($resultUser) > 0) {

            echo '<div class="alert alert-danger text-center" role="alert">
                        sorry user is exist
                    </div>';

        }else {
            // Prepare the statement
            $sql = "INSERT INTO users (name, email, password, mobile)
                    VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
    
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $mobile);
    
            // Execute the prepared statement
            $result = mysqli_stmt_execute($stmt);
    
            // Check for successful
            if($result) {
                echo '<div class="alert alert-success text-center" role="alert">
                        you have successfully registered!
                    </div>';
    
                //this is the php way to set header which will redirect you to logIn.php in 1 seconds 
                header( "refresh:1;url=logIn.php" );
            } else {
                die("Data insertion failed: " . mysqli_error($conn));
            }
    
            // Close the prepared statement
            mysqli_stmt_close($stmt);

        }


        
    }
    
    // close connect
    mysqli_close($conn);
    
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
                        <h4>Sign Up</h4>
                    </div>
                    <div class="card-body">
                        <form action="signUp.php" method="post">
                            <div class="form-group">
                                <label for="name">Your name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Phone:</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                            <div class="form-group text-center">
                                Already have an account? <a href="logIn.php">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>