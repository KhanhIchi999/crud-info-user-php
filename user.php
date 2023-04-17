<?php

    include 'connect.php';

    if(isset($_POST["submit"])){

        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];


        // Prepare the statement
        $sql = "INSERT INTO crud (name, email, password, mobile)
                VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $mobile);

        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);

        // Check for successful insertion
        if($result) {
            echo "Data inserted successfully";
            header('Location: display.php');
        } else {
            die("Data insertion failed: " . mysqli_error($conn));
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
        
    }
    // close connect
    mysqli_close($conn);
    
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add a user</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            max-width: 400px;
            width: 100%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add a user</div>
                    <div class="card-body">
                        <form action="user.php" method="post">
                            <div class="form-group">
                                <label for="username">User name</label>
                                <input type="text" class="form-control" id="username" name="name" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter phone number">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
