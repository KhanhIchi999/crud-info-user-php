<!DOCTYPE html>
<html>

<head>
    <title>Display Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container my-5">
        <a href="user.php" role="button" class="btn btn-primary">Add a user</a>
        <h2 class="text-center">List users</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                 <?php

                    include 'connect.php';

                     // Query to fetch data from the table
                    $sql = "SELECT * FROM crud";
                    $result = mysqli_query($conn, $sql);

                    // Check if data is available
                    if (mysqli_num_rows($result) > 0) {
                        
                        // Loop through each row
                        while($row = mysqli_fetch_assoc($result)) {

                            // Access data using column names
                            $name = $row["name"];
                            $email = $row["email"];
                            $password = $row["password"];
                            $mobile = $row["mobile"];
                            $id = $row["id"];

                            echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td> ' . $name . '</td>
                                <td> ' . $email . '</td>
                                <td> ' . $password . '</td>
                                <td> ' . $mobile . '</td>
                                <td>
                                    <a href="delete.php?deleteid='.$id.'" role="button" class="btn btn-danger">Delete</a>
                                    <a href="edit.php?editid='.$id.'" role="button" class="btn btn-success">Edit</a>
                                </td>
                            </tr>';
                        }
                    } else {
                        echo "No data available";
                    }

                    // Close database connection
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>