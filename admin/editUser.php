<?php

    include '../connectDB.php';

    $name = '';
    $email = '';
    $password = '';
    $mobile = '';
    $id = '';
    
    // check if editid variable exists on url
    if(isset($_GET['editid'])) {
        
        // ID of the row to be deleted get from param deleteid of url
        $id = $_GET['editid'];

         // Query to fetch row by ID
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Fetch the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if row was found
        if(mysqli_num_rows($result) > 0) {
            // Fetch the row data
            $row = mysqli_fetch_assoc($result);
            // Access individual columns using column names
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $mobile = $row['mobile'];

            // echo "Name: " . $row['name'] . "<br>";

        } else {
            echo "No data found for ID: " . $id;
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);


    }
    
    // check if user click on submit button
    if(isset($_POST["submit"])) {

        
         // New values for the row
        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newPassword = $_POST['password'];
        $newMobile = $_POST['mobile'];
        $id = $_POST['id'];

         // Query to update row by ID
        $sql = "UPDATE users SET name=?, email=?, password=?, mobile=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssi", $newName, $newEmail, $newPassword, $newMobile, $id);

         // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);

        // Check if row was updated
        if($result) {
            echo "Row updated successfully";
            header('Location: index.php?page=user'); //redirect to user page
        } else {
            echo "Row update failed: " . mysqli_error($conn);
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
                    <div class="card-header">Edit user</div>
                    <div class="card-body">
                        <form action="editUser.php" method="post">
                            <div class="form-group d-none">
                                <label for="id">id</label>
                                <input   type="text" class="form-control" id="id" name="id" value=<?php echo $id ?>>
                            </div>
                            <div class="form-group">
                                <label for="name">User name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile; ?>" placeholder="Enter phone number">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
